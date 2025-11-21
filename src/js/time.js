(function() {
    const time = document.querySelector('#time');

    if(time) {
        const category = document.querySelector('[name=category_id]');
        const days = document.querySelectorAll('[name=day]');
        const inputHiddenDay = document.querySelector('[name=day_id]');
        const inputHiddenTime = document.querySelector('[name=time_id]');

        category.addEventListener('change', endSearch)
        days.forEach(day => day.addEventListener('change', endSearch));

        let search = {
            category_id: '',
            day: ''
        }

        function endSearch(e) {
            search[e.target.name] = e.target.value;

            inputHiddenTime.value = '';
            inputHiddenDay.value = '';

            const previousTime = document.querySelector('.time__hour--selected');
            if(previousTime) {
                previousTime.classList.remove('time__hour--selected');
            }

            if(Object.values(search).includes('')) {
                return;
            }

            searchEvent();
        }

        async function searchEvent() {
            const {day, category_id} = search;
            const url = `/api/events-time?day_id=${day}&category_id=${category_id}`;

            const result = await fetch(url);
            const events = await result.json();
            getAvailableTime(events);
        }

        function getAvailableTime(events) {
            const listTime = document.querySelectorAll('#time li');
            listTime.forEach(li => li.classList.add('time__hour--disable'));

            const timeTaken = events.map(event => event.time_id);
            const listTimeArray = Array.from(listTime);

            const result = listTimeArray.filter(li => !timeTaken.includes(li.dataset.timeId));
            result.forEach(li => li.classList.remove('time__hour--disable'));

            const availableTime = document.querySelectorAll('#time li:not(.time__hour--disable)');
            availableTime.forEach(time => time.addEventListener('click', selectTime));
        }

        function selectTime(e) {
            const previousTime = document.querySelector('.time__hour--selected');
            if(previousTime) {
                previousTime.classList.remove('time__hour--selected');
            }

            e.target.classList.add('time__hour--selected');

            inputHiddenTime.value = e.target.dataset.timeId

            inputHiddenDay.value = document.querySelector('[name="day"]:checked').value;
        }
    }
})();
