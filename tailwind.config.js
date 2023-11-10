/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
  theme: {
    extend: {
        width: {
            '109':'345px',
            '110': '598px',
            '113':'1480px'
        },
        height: {
            '110': '455px',
            '111': '460px',
            '111.5':'700px',
            '112': '900px',
        },
        colors: {
            'regal': '#F5F6F7',
            'rega1': '#003367',
            'grey1':'#95A2A7',
            'grey2':'#EBEEEF',
            'grey3':'#003367',
            'greydark':'#546E7B',
            'red1':'#AF2727',
            'blue1':'#003367'
        },
    },
  },
  plugins: [],
}



