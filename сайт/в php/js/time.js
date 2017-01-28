var d = new Date();
minutes = d.getMinutes();
hours = d.getHours();
document.write('<h3 class="text-center">');
document.write(hours);
if (minutes >= 0 && minutes <= 9) {
    document.write(":0");
} else {
    document.write(":");
}
document.write(minutes);
document.write('</h3>');