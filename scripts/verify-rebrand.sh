#!/bin/bash
# verify-rebrand.sh — CI gate: no stale "FOG" references remain on the product
# surface. Returns non-zero if any non-allowlisted reference is found.
# Designed for pre-commit hooks and CI.
#
# Uses `git grep` so only tracked files are scanned and pathspec exclusions are
# honoured reliably. Genuine upstream attribution (required by GPLv3 §5) is
# allowlisted and will not fail the gate.

set -uo pipefail

TARGET_PATH="${1:-/opt/wraith}"
cd "$TARGET_PATH"

echo "=== WRAITH Rebrand Verification ==="
echo ""

# Text file types to scan (mirrors scripts/rebrand.sh).
INCLUDES=(
    '*.php' '*.js' '*.css' '*.sh' '*.md' '*.html' '*.txt' '*.sql'
    '*.json' '*.xml' '*.yml' '*.conf' '*.ini' '*.cfg' '*.class'
)

# Attribution / meta files that legitimately reference upstream by design:
#   LICENSE / NOTICE      — verbatim license + required upstream credit
#   ROADMAP.md / UPSTREAM_VERSION — document the fork lineage
#   scripts/*             — contain FOG only as search patterns
EXCLUDES=(
    ':(exclude)LICENSE'
    ':(exclude)NOTICE'
    ':(exclude)ROADMAP.md'
    ':(exclude)UPSTREAM_VERSION'
    ':(exclude)scripts/*'
)

# Legitimate upstream credit — must NOT fail the gate.
ALLOWED='FOG Project|github\.com/FOGProject|FOGProject/fogproject'

# Patterns that should NOT appear on the product surface.
BAD_PATTERNS=(
    "\\bFOG\\b"
    "\\bfog\\b"
    "FOGProject"
    "fogproject"
    "installfog"
    "FOGService"
    "FOG_Cron"
    "fog\.conf"
    "/var/www/fog"
    "/opt/fog"
    "/var/log/fog"
    "\.fog-"
)

EXIT_CODE=0

for pattern in "${BAD_PATTERNS[@]}"; do
    RESULTS=$(git grep -nE "$pattern" -- "${INCLUDES[@]}" "${EXCLUDES[@]}" 2>/dev/null \
        | grep -vE "$ALLOWED" \
        | head -50) || true

    if [ -n "$RESULTS" ]; then
        echo "❌ Found '$pattern':"
        echo "$RESULTS"
        EXIT_CODE=1
    fi
done

# Filename check: any tracked file with fog in the name fails the gate.
FILE_HITS=$(git ls-files 2>/dev/null | grep -i "fog" | head -50) || true
if [ -n "$FILE_HITS" ]; then
    echo "❌ Filenames still contain 'fog':"
    echo "$FILE_HITS"
    EXIT_CODE=1
else
    echo "✅ Filenames clean — no fog in any tracked path."
fi

if [ "$EXIT_CODE" -eq 0 ]; then
    echo "✅ Clean — no uncredited FOG branding remnants found."
    echo "   (Allowlisted upstream attribution: $ALLOWED)"
else
    echo ""
    echo "⚠️  Some branding remnants remain. Review and fix before committing."
    echo "   Genuine upstream credit (e.g. 'FOG Project') is allowed; this gate"
    echo "   fails only on non-allowlisted references."
fi

exit $EXIT_CODE
