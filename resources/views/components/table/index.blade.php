<div class="overflow-x-auto rounded-lg border border-gray-200 dark:border-gray-700 shadow-sm">
    <table {{ $attributes->merge(['class' => 'min-w-full divide-y divide-gray-200 dark:divide-gray-700 text-left text-sm']) }}>
        @if (isset($head))
            <thead class="bg-gray-50 dark:bg-gray-700/50">
                <tr>
                    {{ $head }}
                </tr>
            </thead>
        @endif

        <tbody class="divide-y divide-gray-200 dark:divide-gray-700 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300">
            {{ $slot }}
        </tbody>
    </table>
</div>