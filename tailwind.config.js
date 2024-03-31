const theme = require("./theme.json");
const colors = require("tailwindcss/colors");
const tailpress = require("@jeffreyvr/tailwindcss-tailpress");
const defaultTheme = require("tailwindcss/defaultTheme");

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./*.php",
    "./**/*.php",
    "./resources/css/*.css",
    "./resources/js/*.js",
    "./safelist.txt",
  ],
  theme: {
    container: {
      center: true,
      padding: {
        DEFAULT: "1rem",
        lg: "1rem",
        xl: "1.5rem",
        "2xl": "2rem",
      },
    },
    borderRadius: {
      none: "0",
      sm: "0.25rem",
      DEFAULT: "0.5rem",
      md: "0.75rem",
      lg: "1rem",
      xl: "1.25rem",
      "2xl": "1.5rem",
      "3xl": "1.75rem",
      full: "9999px",
    },
    extend: {
      colors: tailpress.colorMapper(
        tailpress.theme("settings.color.palette", theme)
      ),
      fontSize: tailpress.fontSizeMapper(
        tailpress.theme("settings.typography.fontSizes", theme)
      ),
      fontFamily: {
        default: [...defaultTheme.fontFamily.sans],
        sans: ["Poppins", ...defaultTheme.fontFamily.sans],
        poppins: ["Poppins", ...defaultTheme.fontFamily.sans],
      },
    },
    screens: {
      xs: "480px",
      sm: "600px",
      md: "768px",
      lg: "1024px",
      xl: "1280px",
      "2xl": "1380px",
      "3xl": "1440px",
      "4xl": "1536px",
      "5xl": "1792px",
      "6xl": "1920px",
    },
  },
  plugins: [
    tailpress.tailwind,
    require("daisyui"),
    require("@tailwindcss/typography"),
    require("@tailwindcss/forms"),
    require("@tailwindcss/aspect-ratio"),
    require("@tailwindcss/container-queries"),
  ],
  daisyui: {
    themes: [
      {
        light: {
          ...require("daisyui/src/theming/themes")["light"],
          primary: "#020044",
          secondary: "#1068F0",
          accent: "#66CCCC",
          neutral: "#F3F1EF",
          "base-100": "#ffffff",
          info: "#0000ff",
          success: "#00ff00",
          warning: "#00ff00",
          error: "#ff0000",
        },
      },
      // {
      //   cpsv: {
      //     primary: "#020044",
      //     secondary: "#1068F0",
      //     accent: "#66CCCC",
      //     neutral: "#F3F1EF",
      //     "base-100": "#ffffff",
      //     info: "#0000ff",
      //     success: "#00ff00",
      //     warning: "#00ff00",
      //     error: "#ff0000",
      //   },
      // },
    ],
    styled: true,
    base: true,
    utils: true,
    logs: false,
    rtl: false,
    prefix: "",
    darkTheme: false,
  },
};
