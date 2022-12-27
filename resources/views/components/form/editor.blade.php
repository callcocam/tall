<div wire:key="{{ $name }}" class="bg-gray-50 px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-6 items-center">
    <dt class="text-sm font-medium text-gray-500">{{ __($label) }}</dt>
    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2" wire:ignore x-data="{
        csrf: '{{ csrf_token() }}',
        selectLocalImage(quillInstance) {
            const input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.click();
            // Listen upload local image and save to server
            input.onchange = () => {
                const file = input.files[0];
                // file type is only image.
                if (/^image\//.test(file.type)) {
                    this.saveToServer(file, quillInstance);
                } else {
                    console.warn('You could only upload images.');
                }
            };
        },
        saveToServer(file, quillInstance) {
            const fd = new FormData();
            fd.append('image', file);
            const xhr = new XMLHttpRequest();
            xhr.open('POST', '{{ $endpoint }}', true);
            xhr.setRequestHeader('X-CSRF-Token', this.csrf);
            xhr.onload = function() {
                if (this.status >= 200 && this.status < 300) {
                    // this is callback data: url
                    const data = JSON.parse(this.responseText);
                    // push image url to rich editor.
                    const range = quillInstance.getSelection();
                    quillInstance.insertEmbed(range.index, 'image', data.url);
                    // puts the cursor at the end of image
                    quillInstance.setSelection(range.index + 1, Quill.sources.SILENT);
                }
            };
            xhr.send(fd);
        }
    }">
        <div  x-init="x_quill = new Quill($el, @js($options))
        

            x_quill.getModule('toolbar').addHandler('image', () => {
                selectLocalImage(x_quill);
            });


            x_quill.on('text-change', function() {
                $dispatch('quill-input', x_quill.root.innerHTML);
            })"
            x-on:quill-input.debounce.defer="@this.set('{{ $key }}', $event.detail)">
            {!! data_get($this->data, $name) !!}
        </div>
    </dd>
</div>
