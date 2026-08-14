#!/bin/bash
# verify-rebrand.sh — CI check: no stale "FOG" references remain
# Returns non-zero if any are found. Designed for pre-commit hooks and CI.

set -euo pipefail

TARGET_PATH="${1:-/opt/wraith}"
cd "$TARGET_PATH"

echo "=== WRAITH Rebrand Verification ==="
echo ""

# NOTE: This script intentionally contains the strings it detects (FOG, fog, etc.)
# as search patterns. The scripts/ directory is therefore excluded from the scan.
EXCLUDE="--exclude-dir=scripts --exclude-dir=.git"

# Patterns that should NOT appear in our codebase
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
    RESULTS=$(grep -rn "$pattern" $EXCLUDE --include="*.php" --include="*.js" \
        --include="*.css" --include="*.sh" --include="*.md" --include="*.sql" \
        --include="*.html" --include="*.json" --include="*.xml" --include="*.yml" \
        --include="*.conf" --include="*.ini" \
        . 2>/dev/null | grep -v ".git/" | head -50) || true

    if [ -n "$RESULTS" ]; then
        echo "❌ Found '$pattern':"
        echo "$RESULTS"
        EXIT_CODE=1
    fi
done

# Filename check: any tracked file with fog in the name fails the gate
FILE_HITS=$(git ls-files 2>/dev/null | grep -i "fog" | head -50) || true
if [ -n "$FILE_HITS" ]; then
    echo "❌ Filenames still contain 'fog':"
    echo "$FILE_HITS"
    EXIT_CODE=1
else
    echo "✅ Filenames clean — no fog in any tracked path."
fi

if [ "$EXIT_CODE" -eq 0 ]; then
    echo "✅ Clean — no FOG branding remnants found."
else
    echo ""
    echo "⚠️  Some branding remnants remain. Review and fix before committing."
fi

exit $EXIT_CODE
