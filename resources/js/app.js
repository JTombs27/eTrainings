require('./bootstrap');

import { createApp, h } from 'vue'
import { createInertiaApp, Head, Link } from '@inertiajs/inertia-vue3'
import Layout  from "./Shared/Layout"
import Modal  from "./Shared/Modal"
import Notification  from "./Shared/Notification"
import { InertiaProgress } from '@inertiajs/progress'
import Select2 from 'vue3-select2-component';

//PLEASE COMMENT THE PLUGINS THAT YOU WON'T BE USING

// FileUpload
import vueFilePond from "vue-filepond";
import FilePondPluginFileValidateType from "filepond-plugin-file-validate-type";
import FilePondPluginImagePreview from "filepond-plugin-image-preview";
import FilePondPluginFileValidateSize from 'filepond-plugin-file-validate-size';
import FilePondPluginImageCrop from 'filepond-plugin-image-crop';
import FilePondPluginImageTransform from 'filepond-plugin-image-transform';

const FilePond = vueFilePond(
    FilePondPluginFileValidateType,
    FilePondPluginImagePreview,
    FilePondPluginFileValidateSize,
    FilePondPluginImageCrop,
    FilePondPluginImageTransform
);
// end FileUpload


createInertiaApp({
  resolve: async name => {
    let page = (await import(`./Pages/${name}`)).default;
    
    page.layout ??= Layout

    return page;
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .component("Link", Link)
      .component("Head", Head)
      .component("Modal", Modal)
      .component("Notification", Notification)
      .component("FilePond", FilePond)
      .component('Select2', Select2)
      .mount(el)
  },

  title: title => 'My App: ' + title
})

InertiaProgress.init({
    delay: 250,
    color: '#29d',
    includeCSS: true,
    showSpinner: false,
})

// GLOBAL JS
$(document).on('select2:open', () => {
    document.querySelector('.select2-search__field').focus();
});
