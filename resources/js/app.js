document.addEventListener("livewire:init", () => {
    Livewire.on("info-updated", (event) => {
        location.reload();
    });

    Livewire.on("info-new", (event) => {
        location.reload();
    });
});
