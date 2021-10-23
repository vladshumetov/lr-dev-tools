let range_mob = document.getElementById('range_mob');

range_mob.addEventListener("change", function () {
    let label = document.getElementById('label_range_mob');
    label.innerText = "Количество мобов на локации: " + range_mob.value;
    console.log(range_mob.value);
});
