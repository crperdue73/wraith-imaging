#!/bin/bash
# rebrand.sh — Replaces FOG branding with WRAITH.
#
# Usage: ./scripts/rebrand.sh [--dry-run] [--path /opt/wraith]
#
# Design notes
# ------------
#   * This script is meant to be REPLAYABLE across upstream merges: run it
#     again on a fresh upstream checkout instead of hand-resolving conflicts.
#   * Attribution is a GPLv3 obligation, not a branding artifact. Phrases in
#     ALLOWLIST (upstream credit, e.g. "FOG Project") are protected from
#     substitution. LICENSE and NOTICE are never touched, and lines carrying
#     upstream copyright / license text are hard-guarded.

set -euo pipefail

DRY_RUN=false
TARGET_PATH="/opt/wraith"

while [[ $# -gt 0 ]]; do
    case "$1" in
        --dry-run) DRY_RUN=true; shift ;;
        --path) TARGET_PATH="$2"; shift 2 ;;
        *) echo "Unknown: $1"; exit 1 ;;
    esac
done

cd "$TARGET_PATH"

NEW_PROJECT="WRAITH"
NEW_PROJECT_LOWER="wraith"

# --- Exception allowlist -----------------------------------------------------
# Phrases that MUST survive substitution verbatim (upstream attribution).
# Without this, a context-free swap rewrites "fork of FOG Project" into
# "fork of WRAITH Project" — erasing the credit the GPL requires.
ALLOWLIST=(
    "FOG Project"
)

# Files that must never be rewritten by this script.
#   LICENSE / NOTICE — verbatim license + required upstream attribution.
#   scripts/*        — contain FOG only as search patterns.
#   ROADMAP.md       — meta doc that references upstream by design.
EXCLUDE_FILES=(
    "./LICENSE"
    "./NOTICE"
    "./ROADMAP.md"
    "./scripts/rebrand.sh"
    "./scripts/verify-rebrand.sh"
)

is_excluded() {
    local f="$1" e
    for e in "${EXCLUDE_FILES[@]}"; do
        [[ "$f" == "$e" ]] && return 0
    done
    return 1
}

# sed address that skips upstream copyright / license lines entirely.
GUARD_ADDR='/Copyright.*\(Syperski\|Zhang\|Free Software Foundation\)\|SPDX-License-Identifier/!'

# Tokenise / detokenise the allowlisted phrases around the substitution pass.
protect() {
    local f="$1" i=0 phrase esc
    for phrase in "${ALLOWLIST[@]}"; do
        esc=$(printf '%s' "$phrase" | sed 's/[.[\*^$]/\\&/g')
        sed -i "s|$esc|@@KEEP_${i}@@|g" "$f"
        i=$((i + 1))
    done
}
unprotect() {
    local f="$1" i=0 phrase
    for phrase in "${ALLOWLIST[@]}"; do
        sed -i "s|@@KEEP_${i}@@|$phrase|g" "$f"
        i=$((i + 1))
    done
}

echo "=== WRAITH Rebrand ==="
echo "Target: $TARGET_PATH"
echo "Mode: $([ "$DRY_RUN" = true ] && echo 'DRY RUN' || echo 'LIVE')"
echo ""

# Step 1: Rename directories containing "fog" (lowercase only)
echo "[1/3] Renaming directories..."
find . -type d -name "*fog*" ! -path "./.git/*" | while read -r d; do
    new_d="${d//fog/$NEW_PROJECT_LOWER}"
    if [ "$DRY_RUN" = true ]; then
        echo "  WOULD RENAME: $d → $new_d"
    else
        mv "$d" "$new_d" 2>/dev/null || echo "  SKIP (may already exist): $d"
    fi
done

# Step 2: Replace in text files (excluded files skipped, guarded lines kept)
echo "[2/3] Replacing in text files..."
FILES=$(find . -type f \( -name "*.php" -o -name "*.js" -o -name "*.css" \
    -o -name "*.sh" -o -name "*.md" -o -name "*.html" -o -name "*.txt" \
    -o -name "*.sql" -o -name "*.json" -o -name "*.xml" -o -name "*.yml" \
    -o -name "*.class" -o -name "*.cfg" -o -name "*.conf" -o -name "*.ini" \) \
    ! -path "./.git/*" 2>/dev/null)

COUNT=0
for f in $FILES; do
    is_excluded "$f" && continue
    if grep -q "\bFOG\b\|\bfog\b" "$f" 2>/dev/null; then
        if [ "$DRY_RUN" = true ]; then
            echo "  WOULD EDIT: $f"
        else
            protect "$f"
            sed -i \
                -e "${GUARD_ADDR} s/\bFOG\b/$NEW_PROJECT/g" \
                -e "${GUARD_ADDR} s/\bfog\b/$NEW_PROJECT_LOWER/g" \
                "$f"
            unprotect "$f"
            echo "  EDITED: $f"
        fi
        COUNT=$((COUNT + 1))
    fi
done

echo ""
echo "=== Summary ==="
echo "Files processed: $COUNT"
echo "Status: $([ "$DRY_RUN" = true ] && echo 'DRY RUN — no changes made' || echo 'LIVE — changes applied')"
echo "Protected phrases: ${ALLOWLIST[*]}"
echo "Protected files:   ${EXCLUDE_FILES[*]}"
echo ""
echo "Next step: cd $TARGET_PATH && bash scripts/verify-rebrand.sh && git diff --stat"
