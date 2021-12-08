require("dotenv").config();
const webpack = require("webpack");
const path = require("path");
const mix = require("laravel-mix");

/**
 * CKE stuff
 */
const CKEditorWebpackPlugin = require("@ckeditor/ckeditor5-dev-webpack-plugin");
const CKEStyles = require("@ckeditor/ckeditor5-dev-utils").styles;
const CKERegex = {
    svg: /ckeditor5-[^/\\]+[/\\]theme[/\\]icons[/\\][^/\\]+\.svg$/,
    css: /ckeditor5-[^/\\]+[/\\]theme[/\\].+\.css/,
};

mix.js("resources/js/app.js", "public/js").vue();
mix.sass("resources/sass/farite/custom/style.scss", "public/css");
mix.sass("resources/sass/farite/fonts/fonts.scss", "public/css");
mix.sass("resources/sass/app.scss", "public/css");

mix.alias({
    "@": path.join(__dirname, "resources/js"),
});

mix.browserSync({
    proxy: process.env.APP_URL,
    open: false,
});

Mix.listen("configReady", (webpackConfig) => {
    const rules = webpackConfig.module.rules;
    const targetSVG = /(\.(png|jpe?g|gif|webp)$|^((?!font).)*\.svg$)/;
    const targetCSS = /\.css$/;

    // exclude CKE regex from mix's default rules
    // if there's a better way to loop/change this, open to suggestions
    for (let rule of rules) {
        if (rule.test.toString() === targetSVG.toString()) {
            rule.exclude = CKERegex.svg;
        } else if (rule.test.toString() === targetCSS.toString()) {
            rule.exclude = CKERegex.css;
        }
    }
});

mix.webpackConfig({
    plugins: [
        // vue esm-bundler
        new webpack.DefinePlugin({
            __VUE_OPTIONS_API__: true,
            __VUE_PROD_DEVTOOLS__: false,
        }),
        new CKEditorWebpackPlugin({
            language: "en",
            addMainLanguageTranslationsToAllAssets: true,
            buildAllTranslationsToSeparateFiles: true,
        }),
    ],
    module: {
        
        rules: [
            {
                test: CKERegex.svg,
                use: ["raw-loader"],
            },
            {
                test: CKERegex.css,
                use: [
                    // {
                    //     loader: "style-loader",
                    //     options: {
                    //         injectType: "singletonStyleTag",
                    //         attributes: {
                    //             "data-cke": true,
                    //         },
                    //     },
                    // },
                    {
                        loader: "postcss-loader",
                        options: CKEStyles.getPostCssConfig({
                            themeImporter: {
                                themePath: require.resolve(
                                    "@ckeditor/ckeditor5-theme-lark"
                                ),
                            },
                            minify: true,
                        }),
                    },
                ],
            },
        ],
    },
});
