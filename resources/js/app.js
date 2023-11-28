import "./bootstrap";

// import Alpine from 'alpinejs';

// window.Alpine = Alpine;

// Alpine.start();

// const channel = Echo.channel('public.playground.1');

// channel.subscribed(() => {
//     console.log('subscribed');
// }).listen('.playground', (event) => {
//     console.log(event);
// });

Echo.private(`private-attendance.created`).listen(".AttendanceCreated", (e) => {
    console.log(e);
});

Echo.private("private-attendance.updated").listen(".AttendanceUpdated", (e) => {
    console.log(e);
});
