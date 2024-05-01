<div>
    <input class="form-control" type="text" wire:model="recipient" placeholder="Recipient ID">
    <textarea class="form-control" wire:model="message" placeholder="Notification message"></textarea>
    <button class="btn btn-primary" wire:click="sendNotification">Send Notification</button>
</div>
