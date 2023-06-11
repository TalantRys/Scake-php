flatpickr.localize(flatpickr.l10ns.ru);
$('input[name="date"]').flatpickr({
  altInput: true,
  altFormat: "F j, Y",
  dateFormat: "Y-m-d",
  disableMobile: true,
})
$('input[name="time"]').flatpickr({
  disableMobile: true,
  enableTime: true,
  noCalendar: true,
  time_24hr: true,
  dateFormat: "H:i",
  minTime: "12:00",
  maxTime: "20:00",
})