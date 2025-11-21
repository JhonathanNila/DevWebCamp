(function() {
    const speakerInput = document.querySelector('#speakers');
    if(speakerInput) {
        let speakers = [];
        let speakersFiltered = [];
        const speakersList = document.querySelector('#speakers-list');
        const speakerHidden = document.querySelector('[name="speaker_id"]');
        getSpeakers();
        async function getSpeakers() {
            const url = `/api/speakers`;
            const response = await fetch(url);
            const result = await response.json();
            componentsFormat(result);
            speakerInput.addEventListener('input', searchSpeakers);
        }
        function componentsFormat(arraySpeaker = []) {
            speakers = arraySpeaker.map(speaker => {
                return {
                    name: `${speaker.name.trim()} ${speaker.lastname.trim()}`,
                    id: speaker.id
                }
            });
        }
        function searchSpeakers(e) {
            const search = e.target.value;
            if(search.length >= 3) {
                const expression = new RegExp(search, "i");
                speakersFiltered = speakers.filter(speaker => {
                    if(speaker.name.toLowerCase().search(expression) != -1) {
                        return speaker;
                    }
                });
            } else {
                speakersFiltered = [];
            }
            showSpeakers();
        }
        function showSpeakers() {
            while(speakersList.firstChild) {
                speakersList.removeChild(speakersList.firstChild);
            }
            if(speakersFiltered.length > 0) {
                speakersFiltered.forEach(speaker => {
                    const speakerHTML = document.createElement('LI');
                    speakerHTML.classList.add('speakers-list__speaker');
                    speakerHTML.textContent = speaker.name;
                    speakerHTML.dataset.speakerId = speaker.id;
                    speakerHTML.onclick = selectSpeaker;
                    speakersList.appendChild(speakerHTML);
                });
            } else {
                const noResult = document.createElement('P');
                noResult.classList.add('speakers-list__no-result');
                noResult.textContent = 'No results for your search';
                speakersList.appendChild(noResult);
            }
        }
        function selectSpeaker(e) {
            const speaker = e.target;
            const previousSpeaker = document.querySelector('.speakers-list__speaker--selected');
            if(previousSpeaker) {
                previousSpeaker.classList.remove('speakers-list__speaker--selected');
            }
            speaker.classList.add('speakers-list__speaker--selected');
            speakerHidden.value = speaker.dataset.speakerId;
        }
    }
})();