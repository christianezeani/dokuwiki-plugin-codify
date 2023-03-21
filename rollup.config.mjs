import { defineConfig } from 'rollup';
import { babel, getBabelOutputPlugin } from '@rollup/plugin-babel';
import terser from '@rollup/plugin-terser';
import resolve from '@rollup/plugin-node-resolve';
import commonjs from '@rollup/plugin-commonjs';
import postcss from 'rollup-plugin-postcss';

export default defineConfig({
  input: {
    codify: 'src/main.js'
  },

  output: {
    dir: 'dist',
    entryFileNames: '[name].js',
    format: 'iife'
  },

  treeshake: true,

  plugins: [
    postcss(),
    
    resolve(),

    commonjs(),

    babel({
      presets: ['@babel/preset-env'],
      babelHelpers: 'bundled'
    }),

    terser()
  ]
});
