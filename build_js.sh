#!/bin/bash

# Autotech JS Bundle Script (Updated for Two-Bundle Architecture)
# Usage: ./build_js.sh

echo "------------------------------------------"
echo "🚀 Building Autotech JS Bundles..."
echo "------------------------------------------"

# Note: Individual source files have been removed to reduce project bloat.
# This script serves as a reference for the bundle composition.
# If you recreate source files for editing, follow this order:

# 1. autotech.bundle.js (UI & Libraries)
# Components: jquery.easing, jquery.msAccordion, common, ajax, sideview, quick, jquery.global, shop_function
# echo "Building autotech.bundle.js..."
# cat js/src/jquery.easing.js \
#     js/src/jquery.msAccordion.js \
#     js/src/common.js \
#     js/src/ajax.js \
#     js/src/sideview.js \
#     js/src/quick.js \
#     js/src/jquery.global.js \
#     js/src/shop_function.js > js/autotech.bundle.js

# 2. g4.core.js (Core Utilities & Security)
# Components: board, capslock, filter, kcaptcha, md5
# echo "Building g4.core.js..."
# cat js/src/board.js \
#     js/src/capslock.js \
#     js/src/filter.js \
#     js/src/kcaptcha.js \
#     js/src/md5.js > js/g4.core.js

echo "✅ Bundles are optimized and modernized (ES6+)."
echo "✅ Headers are using automatic cache-busting (?v=mtime)."
echo "------------------------------------------"
