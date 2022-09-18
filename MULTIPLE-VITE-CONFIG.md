
## Compile multiple tailwind css from different tailwind.config.js files using laravel-vite

Se você deseja compilar dois ou mais CSS tailwind de diferentes arquivos tailwind.config.js, então você terá que seguir este guia.

#### SCENARIO:
Eu quero criar dois arquivos **tailwind.config.js** um config para FRONTEND e outro para BACKEND.

Como posso fazer isso com laravel-vite, porque é uma nova ferramenta para agrupamento de ativos, mas estou familiarizado com o pacote laravel mix?


Sim, é possível compilar tailwind css de diferentes tailwind.config.js.

basta seguir estes passos comigo para implementar isso no projeto laravel.

vamos começar!!!


### STEP 1:
Crie dois arquivos de **vite.config.js**. Um para front-end e segundo para back-end

#### file 1: frontend.vite.config.js
```javascript
import { defineConfig } from 'vite';
import laravel, { refreshPaths } from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/frontend/frontend-tailwind.css',
            ],
            refresh: [
                ...refreshPaths,
            ],
            buildDirectory: '/frontendAssets',
        }),
    ],
    css: {
        postcss: {
            plugins: [
                require("tailwindcss/nesting"),
                require("tailwindcss")({
                    config: "./frontend-tailwind.config.js",
                }),
                require("autoprefixer"),
            ],
        },
    },
});
```
#### file 2: backend.vite.config.js
```javascript
import { defineConfig } from 'vite';
import laravel, { refreshPaths } from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/backend/dashboard/backend-tailwind.css',
            ],
            refresh: [
                ...refreshPaths,
            ],
            buildDirectory: '/backendAssets/dashboard',
        }),
    ],
    css: {
        postcss: {
            plugins: [
                require("tailwindcss/nesting"),
                require("tailwindcss")({
                    config: "./backend-tailwind.config.js",
                }),
                require("autoprefixer"),
            ],
        },
    },
});
```
### STEP 2: 

Crie dois arquivos **tailwind.config.js** para front-end e back-end.

#### file 1: frontend-tailwind.config.js
```javascript
/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
    ],
    theme: {
      extend: {},
    },
    plugins: [],
  }
  ```
#### file 2: backend-tailwind.config.js
```javascript
/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
    ],
    theme: {
      extend: {},
    },
    plugins: [],
  }
  ```
### STEP 3:
Agora abra **package.json** e adicione os dois scripts a seguir
```json
"scripts": {
    "dev": "vite",
    "build": "vite build",
    "build:backend": "vite build --config vite.backend.config.js",
    "build:frontend": "vite build --config vite.frontend.config.js"
},
```
### STEP 4:
Crie dois modelos de visualização **blade.php** em **/resources/views**

#### file 1: frontend-interface.blade.php
```html
<!DOCTYPE html>
<html lang="en">
<head>
    {{
        Vite::useBuildDirectory('/frontendAssets')
    }}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/frontend/frontend-tailwind.css')

</head>
<body>
    <div style="width:50%; margin:100px auto">
        <h1>FrontEnd Interface</h1>
        <button class="frontend" style="padding: 10px; font-size:30px">
            red button for frontend
        </button>
    </div>
</body>
</html>
```
#### file 2: backend-dashboard.blade.php
```html
<!DOCTYPE html>
<html lang="en">
<head>
    {{
        Vite::useBuildDirectory('/backendAssets/dashboard')
    }}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/backend/dashboard/backend-tailwind.css')

</head>
<body>
    <div style="width:50%; margin:100px auto">
        <h1>backend dashboard</h1>
        <button class="backend" style="padding: 10px;font-size:30px">
            blue button for backend
        </button>
    </div>
</body>
</html>
```
### STEP 5:

Agora crie um arquivo **/resources/backend/dashboard/backend-tailwind.css** e cole o código a seguir.
```css
@tailwind base;
@tailwind components;
@tailwind utilities;

.backend{
    @apply bg-blue-500;
}
```

Crie mais um arquivo **/resources/frontend/frontend-tailwind.css** e cole o código a seguir.
```css
@tailwind base;
@tailwind components;
@tailwind utilities;

.frontend{
    @apply bg-red-500;
}
```
### STEP 6:
então configuramos um aplicativo laravel de demonstração, basta executar o **comando no terminal** e executar seu projeto.
```
npm run build:backend
npm run build:frontend
```

## License

The software licensed under the [MIT license](https://opensource.org/licenses/MIT).