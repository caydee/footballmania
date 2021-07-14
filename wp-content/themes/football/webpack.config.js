const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const UglifyJsPlugin = require('uglifyjs-webpack-plugin');
var path = require('path');

// change these variables to fit your project
const jsPath= './src/js';
const cssPath = './src/scss';
const outputPath = './assets';
const localDomain = 'http://mysite.local';
const entryPoints = {
    // 'app' is the output name, people commonly use 'bundle'
    // you can have more than 1 entry point
    'app': jsPath +'/app.js',

};
const css = {
    // 'app' is the output name, people commonly use 'bundle'
    // you can have more than 1 entry point
    'app': cssPath +'/app.scss',

};
module.exports = [{
        entry: entryPoints,
    output: {
        path: path.resolve(__dirname, outputPath),
        filename: 'js/[name].js',
    },

    module: {
        rules: [

            {
                test: /\.(jpg|jpeg|png|gif|woff|woff2|eot|ttf|svg)$/i,
                use: 'url-loader?limit=1024'
            }
        ]
    },
    optimization: {
        minimizer: [
            new UglifyJsPlugin({
                uglifyOptions: {
                    output: {
                        comments: false
                    }
                }
            })
        ]
    }
},
    {
        entry: css,
        output: {
            path: path.resolve(__dirname, outputPath),

        },
        plugins: [
            new MiniCssExtractPlugin({
                filename: 'css/[name].css',
            }),


        ],
        module: {
            rules: [
                {
                    test: /\.css$/i,
                    use: [
                        MiniCssExtractPlugin.loader,
                        'css-loader',
                        'sass-loader'
                    ]
                },
                {
                    test: /\.scss$/i,
                    use: [
                        MiniCssExtractPlugin.loader,
                        'css-loader',
                        {
                            loader: 'sass-loader',
                            options: {
                                sassOptions: { indentedSyntax: true }
                            }
                        }
                    ]
                },
                {
                    test: /\.(jpg|jpeg|png|gif|woff|woff2|eot|ttf|svg)$/i,
                    use: 'url-loader?limit=1024'
                }
            ]
        }
    }

]

;