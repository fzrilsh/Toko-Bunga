#!/bin/bash

# 🔍 Laravel Storage Diagnostic Script
# Run this on your production server to diagnose storage issues

echo "=================================="
echo "🔍 Laravel Storage Diagnostics"
echo "=================================="
echo ""

# Colors
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

# 1. Check if we're in Laravel root
if [ ! -f "artisan" ]; then
    echo -e "${RED}❌ Error: artisan file not found. Please run this script from Laravel root directory${NC}"
    exit 1
fi

echo -e "${GREEN}✅ Laravel project detected${NC}"
echo ""

# 2. Check symbolic link
echo "1️⃣ Checking symbolic link..."
if [ -L "public/storage" ]; then
    TARGET=$(readlink public/storage)
    echo -e "${GREEN}✅ Symbolic link exists${NC}"
    echo "   → Target: $TARGET"
    
    if [ -d "$TARGET" ]; then
        echo -e "${GREEN}✅ Target directory exists${NC}"
    else
        echo -e "${RED}❌ Target directory does not exist!${NC}"
        echo -e "${YELLOW}   Run: php artisan storage:link${NC}"
    fi
else
    echo -e "${RED}❌ Symbolic link does not exist!${NC}"
    echo -e "${YELLOW}   Run: php artisan storage:link${NC}"
fi
echo ""

# 3. Check permissions
echo "2️⃣ Checking permissions..."
STORAGE_PERM=$(stat -f "%OLp" storage/ 2>/dev/null || stat -c "%a" storage/ 2>/dev/null)
PUBLIC_STORAGE_PERM=$(stat -f "%OLp" public/storage 2>/dev/null || stat -c "%a" public/storage 2>/dev/null)

echo "   storage/: $STORAGE_PERM"
echo "   public/storage/: $PUBLIC_STORAGE_PERM"

if [ "$STORAGE_PERM" -ge "755" ]; then
    echo -e "${GREEN}✅ Storage permissions OK${NC}"
else
    echo -e "${YELLOW}⚠️  Storage permissions might be too restrictive${NC}"
    echo -e "${YELLOW}   Run: chmod -R 755 storage/${NC}"
fi
echo ""

# 4. Check if files exist
echo "3️⃣ Checking storage files..."
if [ -d "storage/app/public" ]; then
    FILE_COUNT=$(find storage/app/public -type f | wc -l)
    echo -e "${GREEN}✅ storage/app/public exists${NC}"
    echo "   Total files: $FILE_COUNT"
    
    # List subdirectories
    echo "   Subdirectories:"
    ls -1 storage/app/public/ | while read dir; do
        if [ -d "storage/app/public/$dir" ]; then
            count=$(find "storage/app/public/$dir" -type f | wc -l)
            echo "      - $dir/ ($count files)"
        fi
    done
else
    echo -e "${RED}❌ storage/app/public does not exist!${NC}"
fi
echo ""

# 5. Check .env configuration
echo "4️⃣ Checking .env configuration..."
if [ -f ".env" ]; then
    APP_URL=$(grep "^APP_URL=" .env | cut -d '=' -f2)
    FILESYSTEM_DISK=$(grep "^FILESYSTEM_DISK=" .env | cut -d '=' -f2)
    
    echo "   APP_URL: $APP_URL"
    echo "   FILESYSTEM_DISK: ${FILESYSTEM_DISK:-public (default)}"
    
    if [[ $APP_URL == *"localhost"* ]]; then
        echo -e "${YELLOW}⚠️  APP_URL is localhost. Update for production!${NC}"
    else
        echo -e "${GREEN}✅ APP_URL configured${NC}"
    fi
else
    echo -e "${RED}❌ .env file not found!${NC}"
fi
echo ""

# 6. Check .htaccess
echo "5️⃣ Checking .htaccess..."
if [ -f "public/.htaccess" ]; then
    echo -e "${GREEN}✅ public/.htaccess exists${NC}"
    
    if grep -q "FollowSymLinks" public/.htaccess; then
        echo -e "${GREEN}✅ FollowSymLinks directive found${NC}"
    else
        echo -e "${YELLOW}⚠️  FollowSymLinks not found in .htaccess${NC}"
        echo -e "${YELLOW}   Add: Options +FollowSymLinks${NC}"
    fi
else
    echo -e "${RED}❌ public/.htaccess not found!${NC}"
fi
echo ""

# 7. Test file access
echo "6️⃣ Testing file accessibility..."
TEST_FILE=$(find storage/app/public -type f -name "*.png" -o -name "*.jpg" -o -name "*.jpeg" | head -1)

if [ -n "$TEST_FILE" ]; then
    RELATIVE_PATH=${TEST_FILE#storage/app/public/}
    PUBLIC_PATH="public/storage/$RELATIVE_PATH"
    
    echo "   Test file: $TEST_FILE"
    
    if [ -f "$PUBLIC_PATH" ] || [ -L "$PUBLIC_PATH" ]; then
        echo -e "${GREEN}✅ File accessible via public/storage/${NC}"
        
        if [ -r "$PUBLIC_PATH" ]; then
            echo -e "${GREEN}✅ File is readable${NC}"
        else
            echo -e "${RED}❌ File exists but not readable!${NC}"
            echo -e "${YELLOW}   Run: chmod 644 $TEST_FILE${NC}"
        fi
    else
        echo -e "${RED}❌ File not accessible via public/storage/${NC}"
    fi
else
    echo -e "${YELLOW}⚠️  No test image files found${NC}"
fi
echo ""

# 8. Summary & Recommendations
echo "=================================="
echo "📋 Summary & Recommendations"
echo "=================================="
echo ""

# Check if all good
ALL_GOOD=true

if [ ! -L "public/storage" ]; then
    ALL_GOOD=false
    echo -e "${RED}❌ Missing symbolic link${NC}"
    echo "   Fix: php artisan storage:link"
    echo ""
fi

if [ ! -d "storage/app/public" ]; then
    ALL_GOOD=false
    echo -e "${RED}❌ Missing storage directory${NC}"
    echo "   Fix: mkdir -p storage/app/public"
    echo ""
fi

if [[ $APP_URL == *"localhost"* ]]; then
    ALL_GOOD=false
    echo -e "${YELLOW}⚠️  Update APP_URL in .env for production${NC}"
    echo ""
fi

if $ALL_GOOD; then
    echo -e "${GREEN}🎉 All checks passed! Storage should be working.${NC}"
    echo ""
    echo "Test URL format:"
    echo "${APP_URL}/storage/[folder]/[filename]"
    echo ""
    echo "Example:"
    echo "${APP_URL}/storage/products/image.png"
else
    echo -e "${YELLOW}⚠️  Some issues found. Please fix the items above.${NC}"
fi

echo ""
echo "=================================="
echo "🔧 Quick Fix Commands"
echo "=================================="
echo ""
echo "# Setup storage symbolic link"
echo "php artisan storage:link"
echo ""
echo "# Fix permissions"
echo "chmod -R 755 storage/"
echo "chmod -R 755 bootstrap/cache/"
echo ""
echo "# Clear cache"
echo "php artisan config:clear"
echo "php artisan cache:clear"
echo "php artisan optimize"
echo ""
echo "=================================="
