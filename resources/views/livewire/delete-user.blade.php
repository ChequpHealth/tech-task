<div>
    <form wire:submit.prevent="delete">
        <button
            type="submit"
            class="text-red-500 hover:text-red-700 cursor-pointer font-semibold  bg-gray-500/25 p-3"
            onclick="return confirm('Are you sure you want to delete this user?')"
        >
        Delete

        </button>
    </form>
</div>
