<template>
    <ckeditor :editor="editor" :config="editorConfig" v-model="value" />

    <!-- <input
        type="text"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
    /> -->
</template>

<script>
import CKEditor from "@ckeditor/ckeditor5-vue";
import ClassicEditor from "@ckeditor/ckeditor5-editor-classic/src/classiceditor";

import EssentialsPlugin from "@ckeditor/ckeditor5-essentials/src/essentials";
import BoldPlugin from "@ckeditor/ckeditor5-basic-styles/src/bold";
import ItalicPlugin from "@ckeditor/ckeditor5-basic-styles/src/italic";
import Underline from "@ckeditor/ckeditor5-basic-styles/src/underline";
import Strikethrough from "@ckeditor/ckeditor5-basic-styles/src/strikethrough";
import HeadingPlugin from '@ckeditor/ckeditor5-heading/src/heading';
import Alignment from '@ckeditor/ckeditor5-alignment/src/alignment';
import LinkPlugin from "@ckeditor/ckeditor5-link/src/link";
import ParagraphPlugin from "@ckeditor/ckeditor5-paragraph/src/paragraph";

import Image from "@ckeditor/ckeditor5-image/src/image";
import ImageUpload from "@ckeditor/ckeditor5-image/src/imageupload";
import ImageToolbar from "@ckeditor/ckeditor5-image/src/imagetoolbar";
import ImageStyle from "@ckeditor/ckeditor5-image/src/imagestyle";
import ImageCaption from "@ckeditor/ckeditor5-image/src/imagecaption";
import ImageResize from "@ckeditor/ckeditor5-image/src/imageresize";

import SourceEditing from "@ckeditor/ckeditor5-source-editing/src/sourceediting";

import Table from "@ckeditor/ckeditor5-table/src/table";
import TableToolbar from "@ckeditor/ckeditor5-table/src/tabletoolbar";
import TableProperties from "@ckeditor/ckeditor5-table/src/tableproperties";
import TableCellProperties from "@ckeditor/ckeditor5-table/src/tablecellproperties";

import UploadAdapter from "@/UploadAdapter";

import GeneralHtmlSupport from '@ckeditor/ckeditor5-html-support/src/generalhtmlsupport';


export default {
    props: ["modelValue"],
    emits: ["update:modelValue"],

    components: {
        ckeditor: CKEditor.component,
    },

    computed: {
        value: {
            get() {
                return this.modelValue;
            },
            set(value) {
                this.$emit("update:modelValue", value);
            },
        },
    },

    data() {
        return {
            editor: ClassicEditor,
            editorConfig: {
                plugins: [
                    EssentialsPlugin,
                    BoldPlugin,
                    ItalicPlugin,
                    Underline,
                    Strikethrough,
                    LinkPlugin,
                    ParagraphPlugin,
                    HeadingPlugin,
                    Alignment,
                    Image,
                    ImageUpload,
                    ImageToolbar,
                    ImageStyle,
                    ImageCaption,
                    ImageResize,

                    SourceEditing,
                    Table,
                    TableToolbar,
                    GeneralHtmlSupport
                ],

                toolbar: {
                    items: [
                        "heading",
                        "bold",
                        "italic",
                        "underline",
                        "strikethrough",
                        "alignment",
                        "|",
                        "|",
                        "insertTable",
                        "link",
                        "imageUpload",
                        "|",
                        "undo",
                        "redo",
                        "|",
                        "sourceEditing",
                    ],
                },

                image: {
                    toolbar: [
                        "imageTextAlternative",
                        "toggleImageCaption",
                        "|",
                        "imageStyle:alignLeft",
                        "imageStyle:alignCenter",
                        "imageStyle:alignRight",
                    ],
                },

                table: {
                    contentToolbar: [
                        "tableColumn",
                        "tableRow",
                        "mergeTableCells",
                        "tableProperties",
                        "tableCellProperties",
                    ],
                },

                extraPlugins: [this.uploader],
                htmlSupport: {
                    allow: [
                        {
                            name: /.*/,
                            attributes: true,
                            classes: true,
                            styles: true
                        }
                    ]
                }
            },
        };
    },

    methods: {
        uploader(editor) {
            editor.plugins.get("FileRepository").createUploadAdapter = (
                loader
            ) => {
                // Configure the URL to the upload script in your back-end here!
                return new UploadAdapter(loader);
            };
        },
    },
};
</script>
