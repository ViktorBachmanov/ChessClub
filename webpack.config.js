const path = require('path');


module.exports = {
    entry: './resources/js/SmartTable.js',

    output: {
        path: path.resolve('./public/js/'),
        filename: 'SmartTableBabel.js'
    },

    module: {

        rules: [{
            test: /\.js$/,
            loader: 'babel-loader'
        }]
        
    }
}