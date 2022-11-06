<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
<body>
<div id="app" class="p-3">
    <div class="grid grid-cols-1 text-3xl p-2">
        <h1 class="mb-4 text-green-500 font-bold">リアルタイム・オンライン通知</h1>
    </div>
    <div class="grid grid-cols-6">
        <div>
            <div class="px-2 py-1">
                <small class="text-gray-500">ユーザー</small>
            </div>
            <div class="col-span-1 bg-blue-100 px-3 py-2 text-blue-700">
                <div v-for="u in users">
                    <div class="grid grid-cols-2 mb-2">
                        <div v-text="u.name"></div>
                        <div v-if="u.is_online" class="text-green-700 text-xs text-right font-bold">オンライン</div>
                        <div v-else class="text-gray-400 text-xs text-right">オフライン</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
