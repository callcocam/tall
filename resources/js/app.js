import './bootstrap';

import Alpine from 'alpinejs';



import Sortablejs from "sortablejs";

window.Sortablejs = Sortablejs;

import settings from './settings';
import site from './site';
import { sidebar, notifications } from './store';

Alpine.data('site', site)
Alpine.data('settings', settings)
Alpine.store('sidebar', sidebar)
Alpine.store('notifications', notifications)

window.addEventListener('notify', event => {
    Alpine.store('notifications').notify(event.detail.title, event.detail.message, event.detail.type, event.detail.time)
})
window.Alpine = Alpine;

Alpine.start();

import './simplebar';