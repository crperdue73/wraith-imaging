#!/bin/bash
# rebrand.sh — Replaces FOG branding with WRAITH
# Usage: ./scripts/rebrand.sh [--dry-run] [--path /opt/wraith]

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

# Step 2: Replace in text files
echo "[2/3] Replacing in text files..."
FILES=$(find . -type f \( -name "*.php" -o -name "*.js" -o -name "*.css" \
    -o -name "*.sh" -o -name "*.md" -o -name "*.html" -o -name "*.txt" \
    -o -name "*.sql" -o -name "*.json" -o -name "*.xml" -o -name "*.yml" \
    -o -name "*.class" -o -name "*.cfg" -o -name "*.conf" -o -name "*.ini" \) \
    ! -path "./.git/*" 2>/dev/null)

COUNT=0
for f in $FILES; do
    if grep -q "\bFOG\b\|\bfog\b" "$f" 2>/dev/null; then
        if [ "$DRY_RUN" = true ]; then
            echo "  WOULD EDIT: $f"
        else
            sed -i \
                -e "s/\bFOG\b/$NEW_PROJECT/g" \
                -e "s/\bfog\b/$NEW_PROJECT_LOWER/g" \
                "$f"
            echo "  EDITED: $f"
        fi
        ((COUNT++))
    fi
done

echo ""
echo "=== Summary ==="
echo "Files processed: $COUNT"
echo "Status: $([ "$DRY_RUN" = true ] && echo 'DRY RUN — no changes made' || echo 'LIVE — changes applied')"
echo ""
echo "⚠️  Next step: Manual review every changed file for false positives."
echo "   Run: cd $TARGET_PATH && git diff --stat"
