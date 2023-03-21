Prism.manual = true;

document.addEventListener('DOMContentLoaded', event => {
  /** @type {NodeListOf<HTMLElement>} */
  const $elements = document.querySelectorAll('pre.dokuwiki-plugin-codify > code');

  for (const $element of $elements) {
    Prism.highlightElement($element);
  }
});
