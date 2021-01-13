@if ($message = Session::get('success'))
<div class="rounded-md bg-green-50 p-4">
    <div class="flex">
        <div class="flex-shrink-0">
            <!-- Heroicon name: check-circle -->
            <svg class="h-5 w-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        </div>
        <div class="ml-3">
            <h3 class="text-sm font-medium text-green-800">
                Success
            </h3>
            <div class="mt-2 text-sm text-green-700">
                <p>
                    {{ $message }}
                </p>
            </div>
        </div>
    </div>
</div>
@endif
