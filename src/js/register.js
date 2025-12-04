import Swal from "sweetalert2";
(function() {
    let events = [];
    const summary = document.querySelector('#reg-summ');

    if(summary) {
        const eventsBtn = document.querySelectorAll('.event__add');
        eventsBtn.forEach(button => button.addEventListener('click', selectEvent));
        const registerForm = document.querySelector('#register');
        registerForm.addEventListener('submit', submitForm);
        showEvents();
        function selectEvent({target}) {
            if(events.length < 5) {
                target.disabled = true;
                events = [...events, {
                    id: target.dataset.id,
                    title: target.parentElement.querySelector('.event__name').textContent.trim()
                }];
                showEvents();
            } else {
                Swal.fire({
                    title: 'Error',
                    text: 'You can select up to 5 conferences or workshops',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        }
        function showEvents() {
            cleanEvents();
            if(events.length > 0) {
                events.forEach(event => {
                    const eventDOM = document.createElement('DIV');
                    eventDOM.classList.add('register__event');
                    const titleEvent = document.createElement('H3');
                    titleEvent.classList.add('register__name');
                    titleEvent.textContent = event.title;
                    const deleteBtn = document.createElement('BUTTON');
                    deleteBtn.classList.add('register__delete');
                    deleteBtn.innerHTML = `<i class="fa-solid fa-trash"></i>`;
                    deleteBtn.onclick = function() {
                        deleteEvent(event.id);
                    };
                    eventDOM.appendChild(titleEvent);
                    eventDOM.appendChild(deleteBtn);
                    summary.appendChild(eventDOM);
                });
            } else {
                const noRegister = document.createElement('P');
                noRegister.textContent = 'There are no events registered; register up to 5 events to list them here';
                noRegister.classList.add('register__text');
                summary.appendChild(noRegister);
            }
        }
        function deleteEvent(id) {
            events = events.filter(event => event.id !== id);
            const addBtn = document.querySelector(`[data-id="${id}"]`);
            addBtn.disabled = false;
            showEvents();
        }
        function cleanEvents() {
            while(summary.firstChild) {
                summary.removeChild(summary.firstChild);
            }
        }
        async function submitForm(e) {
            e.preventDefault();
            const giftID = document.querySelector('#gift').value;
            const eventsID = events.map(event => event.id);
            if(giftID === '' || eventsID.length === 0) {
                Swal.fire({
                    title: 'Error',
                    text: 'Choose at least one Event and one Gift',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
                return
            }
            const data = new FormData();
            data.append('events', eventsID);
            data.append('gift_id', giftID);
            const url = '/register/conferences';
            const response = await fetch(url, {
                method: 'POST',
                body: data
            });
            const result = await response.json();
            console.log(result);
            if(result.result) {
                Swal.fire(
                    'Register Sucefull',
                    'Your conferences have been reserved and your registration was successful. We look forward to seeing you at DevWebCamp',
                    'success'
                ).then(() => location.href = `/pass?id=${result.token}`)
            } else {
                Swal.fire({
                    title: 'Error',
                    text: 'Something went wrong...',
                    icon: 'error',
                    confirmButtonText: 'OK'
                }).then(() => location.reload());
            }
        }
    }
})();