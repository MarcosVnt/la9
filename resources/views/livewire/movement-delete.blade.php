<x-modal-confirm
    livewire-event-to-open-modal="deleteMovementWasSet"
    event-to-close-modal="movementWasDeleted"
    modal-title="Borrar Movimiento"
    modal-description="Are you sure you want to delete this comment? This action cannot be undone."
    modal-confirm-button-text="Delete"
    wire-click="deleteMovement"
/>