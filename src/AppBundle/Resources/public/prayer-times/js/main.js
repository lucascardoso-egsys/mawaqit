/* global prayer */
/* global randomHadith */
/* global weather */
/* global messageInfoSlider */
/* global douaaSlider */

prayer.loadData();
prayer.setBackgroundColor();
prayer.setTime();
prayer.setDate();
prayer.setTimes();
prayer.setWaitings();
prayer.initNextTimeHilight();
prayer.initAdhanFlash();
prayer.initIqamaFlash();
prayer.initCronHandlingTimes();
prayer.jumuaDhikrReminder.init();
prayer.setCustomTime();
prayer.initUpdateConfData();
prayer.initWakupFajr();
prayer.initEvents();
prayer.translateToArabic();
prayer.setQRCode();
prayer.hideSpinner();
randomHadith.init();
weather.initUpdateTemperature();
douaaSlider.init();
messageInfoSlider.initCronMessageInfo();