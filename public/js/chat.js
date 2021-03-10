var data = [
    // global
    {"question": "hi hello", "answer": "hello sir"},
    {"question": "thanks thank", "answer": "you are welcome"},
    {"question": "welcome wow good fantastic amazing ", "answer": "thank you"},
    {"question": "good better fine", "answer": "ok, i hope this"},
    // personal
    {"question": "robot", "answer": "yes i'm a robot to response for your questions"},
    {"question": "who robot", "answer": "im a robot and im here to help you "},
    {"question": "name nickname firstname lastname", "answer": "company name is buildertravel"},
    {"question": "times work", "answer": "company work times from 9 to 6"},
    {"question": "age", "answer": "i'm a young man"},
    {"question": "job work", "answer": "i'm here for you sir"},
    {"question": "website link url", "answer": "this is website of company <a target='_blank' href='https://www.buildertravel.com' >buildertravel</a> "},
    // social media
    {"question": "facebook page massenger", "answer": 'you can visit our facebook page on <a target="_blank" href="https://www.facebook.com/pg/buildertraveleg/videos/?ref=page_internal" >videos</a>  '},
    {"question": "twitter page twit", "answer": 'company doesnt have twitter account '},
    {"question": "instagram page", "answer": 'company doesnt have instagram account '},
    {"question": "linkedin page", "answer": 'company doesnt have linkedin account '},
    {"question": "images photos image photo company", "answer": 'you can visit our facebook page to see images of company <a target="_blank" href="https://www.facebook.com/pg/buildertraveleg/videos/?ref=page_internal" >videos</a>  '},
    {"question": "whatsapp whats what'sapp whatapp", "answer": "whatsapp of company is 01018999919"},
    {"question": "tel phone telephone telephones hotline contact phones", "answer": "phones of company 0020233388506 and hotline 16320"},
    {"question": "fax", "answer": "company fax is 33368661"},
    {"question": "address place where company", "answer": "this is company address <br> 37 Mosadaq St., Al-Dokki, Giza, Egypt"},
    {"question": "location map google", "answer": 'location of company on google map <br><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d215.86844828609227!2d31.206647564394736!3d30.0398651189821!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x145846d2961eb7c7%3A0x4174b9bd0afb409!2zQnVpbGRlciBUcmF2ZWwg2KjZitmE2K_YsSDZhNmE2LPZitin2K3Zhw!5e0!3m2!1sar!2seg!4v1560644493914!5m2!1sar!2seg" width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>'},
    {"question": "email mail gmail message", "answer": "company Mail: m.elwy@buildertravel.com"},
    {"question": "channel youtube", "answer": 'you can watch our videos on <a target="_blank" href="https://www.facebook.com/pg/buildertraveleg/videos/?ref=page_internal" >videos</a>  '},
    {"question": "domestic foreign tourism", "answer": "you can contact with company for more details on 01122330011 � 01148556667 or visit <a target='_blank' href='https://www.buildertravel.com/domestic-tours/' >domestic tours</a>  "},
    {"question": "religious tourism", "answer": "you can contact with company for more details on 01155221166 or visit <a target='_blank' href='https://www.buildertravel.com/hajj/' >hajj offers</a>  "},
    {"question": "aviation aviations", "answer": "you can contact with company for more details on 01155220077 or visit <a target='_blank' href='https://www.buildertravel.com/aviation/' >aviation</a>  "},
    {"question": "transportation", "answer": "you can contact with company for more details on 01008080554 or visit <a target='_blank' href='https://www.buildertravel.com/transportation/' >transportation</a>  "},
    {"question": "offers offer tour tours", "answer": "you can contact with company for more details on 01008080554 or visit our website <a target='_blank' href='https://www.buildertravel.com' >buildertravel</a>  "},
    {"question": "service services", "answer": "we offer good services for customer "},
    {"question": "ceo manager", "answer": "Dr.Mohamed Elwy is the manager of the company contact with he on facebook"},
    {"question": "shop", "answer": "visit our shop on <a target='_blank' href='shop' >shop</a>  "},
    {"question": "categories category", "answer": "discover our categories in shop <a target='_blank' href='shop' >shop</a>  "},
    {"question": "prices price", "answer": "ask the admin for more details about prices 01018999919 or discover our offers"},
    {"question": "problem have", "answer": "ok sir no problem you can contact with company on 0020233388506 and hotline 16320 or whatsapp 01018999919"},
];

var chatbot = (function () {


    function chatbot(url, soundPath) {
        this.url = url;
        this.soundPath = soundPath;
        this.data = data;
        this.question = null;
        this.matchers = [];
        this.defaultAnswer = "can you explain more details ☹️ or contact with admin for more details <br> Tel.: 3851 9333 - 3851 9444 <br> Mob.: 0122 2222 712";
        this.container = document.getElementById("chatroom");

        this.stopwords = " \" | +  * // . ! @ # $ % ^ & ( ) { } , ; : ' ~ ? ؟ أ = _  ";

        this.loadData();
        this.great();
    }

    chatbot.prototype.great = function () {
        var self = this;
        var sp = this.createWritingAnimation();
        setTimeout(function () {
            sp.remove();
            self.response = 
            "can i help you sir ? you can ask me about office, outlet, bedrooms, product codes, product description, product material, product brand and any category .. ";
            //new Audio(self.soundPath).play();
            self.createResponseView();
        }, 2000);
    };

    chatbot.prototype.say = function(word) {
        var msg = new SpeechSynthesisUtterance(word);
        window.speechSynthesis.speak(msg);
    };

    chatbot.prototype.loadData = function () {
        var self = this;
        $.get(self.url, function (response) {
            self.data = response;//JSON.parse(response);
            console.log(response);
        });
    };

    chatbot.prototype.ask = function (question) {
        var self = this;
        this.question = question.toLowerCase();
        this.createAskView();

        var sp = this.createWritingAnimation();
        setTimeout(function () {
            sp.remove();
            new Audio(self.soundPath).play();
            self.getResponse();
        }, 2000);
    };

    chatbot.prototype.createWritingAnimation = function () {
        var spinnerContainer = document.createElement("div");
        spinnerContainer.innerHTML =
                '<div class="damn roboto">' +
                '<div class="chat-message">' +
                '<div class="chat-spinner"><span class="dot"></span><span class="dot"></span><span class="dot"></span></div>' +
                //'<span class="t" >'+new Date().toLocaleTimeString()+'</span>'+
                '</div>  ' +
                '</div>';
        spinnerContainer.className = "damn roboto";
        this.container.appendChild(spinnerContainer);
        return spinnerContainer;
    };

    chatbot.prototype.removeStopwords = function (word) {
        var newword = "";
        for (var i = 0; i < word.length; i++) {
            var c = word.charAt(i);
            if (this.stopwords.indexOf(c) <= 0) {
                newword += c;
            }
        }
        return newword;
    };

    chatbot.prototype.toKeys = function (sentence) {
        var array = sentence.split(" ");
        var arr = [];
        var dic = {};
        for (var i = 0; i < array.length; i++) {
            var word = array[i];
            word = this.removeStopwords(word);
            if (word.length > 0) {
                if (dic[word] == null) {
                    arr.push(word);
                    dic[word] = word;
                }
            }
        }
        return arr;
    };

    chatbot.prototype.getMatching = function (arr1, arr2) {
        var matching = 0;

        for (var i = 0; i < arr1.length; i++) {
            var e1 = arr1[i];
            for (var j = 0; j < arr2.length; j++) {
                var e2 = arr2[j];
                matching += (e1 == e2) ? 1 : 0;
            }
        }
        return matching;
    };

    chatbot.prototype.match = function () {
        var arr1 = this.toKeys(this.question); 
        this.matchers = [];
        for (var i = 0; i < this.data.length; i++) {
            var arr2 = this.toKeys(this.data[i].question); 
            this.matchers.push([this.getMatching(arr1, arr2), i]);
        } 
    };

    chatbot.prototype.getResponse = function () {
        this.match();
        if (this.matchers.sort().reverse()[0][0] == 0)
            this.response = this.defaultAnswer;
        else {
            var arr = this.randIfEquels(this.matchers.sort().reverse());
            this.response = this.data[arr[1]].answer; 
        }

        this.say(this.response);
        this.createResponseView();
    };
    
    chatbot.prototype.randIfEquels = function(arr) {
        var first = arr[0][0];
        var newArr = [];
        for(var i = 0; i < arr.length; i ++) {
            if (arr[i][0] == first) {
                newArr.push(arr[i])
            }
        }
        
        console.log(newArr);
        var randIndex = parseInt(Math.random()* newArr.length);
        return newArr[randIndex];
    }

    chatbot.prototype.createAskView = function () {
        var html =
                '<div class="damn human">' +
                '<div class="chat-message">' +
                '<span class="m" >' + this.question + '</span>' +
                '<span class="t" >' + new Date().toLocaleTimeString() + '</span>' +
                '</div>  ' +
                '</div>';

        this.container.innerHTML += html;

    };

    chatbot.prototype.createResponseView = function () {

        var html =
                '<div class="damn roboto">' +
                '<div class="chat-message w3-container">' +
                '<div class="m" >' + this.response + '</div>' +
                '<span class="t" >' + new Date().toLocaleTimeString() + '</span>' +
                '</div>  ' +
                '</div>';
        this.container.innerHTML += html;

    };

    return chatbot;

}());

var html =
        '<input id="close" type="checkbox">' +
        '<div class="chat-window">' +
        '<input id="trigger" type="checkbox">' +
        '<label for="trigger" class="top">' +
        '<div class="online"></div> Customer Chatbot Support' +
        //'<label for="close" class="close">�</label>' +
        '</label>' +
        '<div class="chat" id="chatroom" >  ' +
        '</div>' +
        '<div class="chat-input" >' +
        '<input type="text" autocomplete="off" id="chatInput" placeholder="do you have a question? " >' +
        '</div>' +
        '</div>';


// load chat
var container = document.createElement("div");
container.innerHTML = html;
document.body.appendChild(container);


document.getElementById("chatInput").onkeydown = function (event) {

    if (event.keyCode == 13) {
        chat.ask(this.value);
        this.value = "";
        $('#chatroom').scrollTop($('#chatroom')[0].scrollHeight);
    }
};

var chat = new chatbot(QUESTIONS_URL, SOUND_PATH);

