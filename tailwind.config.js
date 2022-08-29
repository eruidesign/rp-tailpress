const _ = require("lodash");
const theme = require('./theme.json');
const tailpress = require("@jeffreyvr/tailwindcss-tailpress");
const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './*.php',
        './**/*.php',
        './resources/css/*.css',
        './resources/js/*.js',
        './safelist.txt'
    ],
    theme: {
        container: {
            padding: {
                DEFAULT: '1rem',
                sm: '2rem',
                lg: '0rem'
            },
        },
        extend: {
            colors: {
                transparent: 'transparent',
                current: 'currentColor',
                'white': '#ffffff',
                'rpgreen': {
                    100: '#dee8cf',
                    300: '#bdd19f',
                    500: '#9cbb70',
                    900: '#7ba440',
                },
                'rppurple': {
                    100: '#d8cae3',
                    300: '#b296c7',
                    500: '#8c62ac',
                    900: '#652d90',
                },
                'rpgray': {
                    100: '#e6e7e8',
                    500: '#565963',
                    900: '#414042',
                },
            },
            //colors: tailpress.colorMapper(tailpress.theme('settings.color.palette', theme)),
            fontFamily: {
                reenie: "ReenieBeanie",
            },
            fontSize: tailpress.fontSizeMapper(tailpress.theme('settings.typography.fontSizes', theme)),
            gridTemplateColumns: {
                // Simple 16 column grid
                '2': 'repeat(2, minmax(0, 1fr))',
            },
            extend: {
                zIndex: {
                  '100': '100',
                  '200': '200',
                  '1000':'1000',
                }
              }
        },
        screens: {
            'xs': '480px',
            'sm': '600px',
            'md': '782px',
            'lg': tailpress.theme('settings.layout.contentSize', theme),
            'xl': tailpress.theme('settings.layout.wideSize', theme),
            //'2xl': '1440px'
            '2xl': '1280px'
        }
    },
    plugins: [
        tailpress.tailwind
    ]
};
