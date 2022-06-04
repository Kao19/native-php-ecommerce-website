document.addEventListener('DOMContentLoaded', () => {

    // card options

    const cardArray = [
        {
            name: 'leds',
            img: 'imgs/arduino leds.jpg'
        },
        {
            name: 'z',
            img: 'imgs/RAM Trident z royal ddr4 16GB.jpg'
        },
        {
            name: 'uno',
            img: 'imgs/arduino uno.jpg'
        },
        {
            name: 'gtx',
            img: 'imgs/GTX 1050 TI.jpg'
        },
        {
            name: 'hdd',
            img: 'imgs/hdd500gb.jpg'
        },
        {
            name: 'hdmi',
            img: 'imgs/hdmi.jpg'
        },
        {
            name: 'leds',
            img: 'imgs/arduino leds.jpg'
        },
        {
            name: 'z',
            img: 'imgs/RAM Trident z royal ddr4 16GB.jpg'
        },
        {
            name: 'uno',
            img: 'imgs/arduino uno.jpg'
        },
        {
            name: 'gtx',
            img: 'imgs/GTX 1050 TI.jpg'
        },
        {
            name: 'hdd',
            img: 'imgs/hdd500gb.jpg'
        },
        {
            name: 'hdmi',
            img: 'imgs/hdmi.jpg'
        }
    ]

    cardArray.sort(() => 0.5 - Math.random())
    console.log(cardArray);

    const grid = document.querySelector('.grid')
    const resultDisplay = document.querySelector('#result')
    let cardsChosen = []
    let cardsChosenId = []
    let cardsWon = []

    function createBoard() {
        for (let i = 0; i < cardArray.length; i++) {
            const card = document.createElement('img');
            card.setAttribute('src', 'imgs/tech.jpg')
            card.setAttribute('data-id', i)
            card.addEventListener('click', flipCard)
            grid.appendChild(card)
        }
    }

    function flipCard() {
        let cardId = this.getAttribute('data-id')
        cardsChosen.push(cardArray[cardId].name)
        cardsChosenId.push(cardId)
        this.setAttribute('src', cardArray[cardId].img)
        if (cardsChosen.length === 2) {
            setTimeout(checkForMatch, 500)
        }
        console.log(cardsChosen);
    }


    function checkForMatch() {
        const cards = document.querySelectorAll('img')
        const optionOneId = cardsChosenId[0]
        const optionTwoId = cardsChosenId[1]

        if (optionOneId == optionTwoId) {
            alert('You have clicked the same image');
            cards[optionOneId].setAttribute('src', 'imgs/tech.jpg')
            cards[optionTwoId].setAttribute('src', 'imgs/tech.jpg')
        } else if (cardsChosen[0] === cardsChosen[1]) {
           
            cards[optionOneId].setAttribute('src', 'imgs/white.jpg')
            cards[optionTwoId].setAttribute('src', 'imgs/white.jpg')
            cards[optionOneId].removeEventListener('click', flipCard)
            cards[optionTwoId].removeEventListener('click', flipCard)
            cardsWon.push(cardsChosen)
        } else {
            cards[optionOneId].setAttribute('src', 'imgs/tech.jpg')
            cards[optionTwoId].setAttribute('src', 'imgs/tech.jpg')
            
        }
        cardsChosen = []
        cardsChosenId = []
        resultDisplay.textContent = cardsWon.length
        if (cardsWon.length === cardArray.length / 2) {
            resultDisplay.textContent = 'Congratulations'
            var url_string = window.location.href; //window.location.href
            var url = new URL(url_string);
            var c = url.searchParams.get("idClt");
            window.location.href = '../afterLoginClient/discount.php?idClt=' + c
        }

    }

    createBoard()
})