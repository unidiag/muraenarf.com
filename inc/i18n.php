<?php

return [
    'site.name' => 'MuraenaRF',

    'site.tagline' => [
        'Распределённая система управления ВЧ-сигналом',
        'Distributed RF signal control system',
    ],

    'nav.menu' => [
        'Меню',
        'Menu',
    ],

    'nav.language' => [
        'Язык',
        'Language',
    ],

    'nav.github' => 'GitHub',

    'nav.open' => [
        'Открыть раздел',
        'Open section',
    ],

    'footer.description' => [
        'Открытый проект аппаратно-программной системы управления радиочастотным трактом.',
        'An open hardware and software project for RF distribution control.',
    ],

    'footer.navigation' => [
        'Разделы',
        'Navigation',
    ],

    'footer.project' => [
        'Проект',
        'Project',
    ],

    'footer.rights' => [
        'Все права защищены.',
        'All rights reserved.',
    ],

    'common.learn_more' => [
        'Подробнее',
        'Learn more',
    ],

    'common.status_development' => [
        'Проект в активной разработке',
        'Under development',
    ],

    'main.menu' => [
        'Главная',
        'Home',
    ],

    'main.title' => [
        'Управление ВЧ-сигналом там, где обычного кабеля уже недостаточно',
        'RF signal control where an ordinary cable is no longer enough',
    ],

    'main.subtitle' => [
        'MuraenaRF объединяет передатчик, управляемые исполнительные блоки и WebUI в единую систему адресного управления радиочастотным трактом.',
        'MuraenaRF combines a transmitter, addressable output modules and a WebUI into a single RF distribution control system.',
    ],


    'main.video_title' => [
        'Видеообзор проекта',
        'Project video overview',
    ],

    'main.video_url' => [
        'EVHs7jmRdXk', // youtube video ID rus
        'EVHs7jmRdXk', // youtube video ID eng
    ],

    'common.close' => [
        'Закрыть',
        'Close',
    ],

    'main.hero_secondary' => [
        'Дeмо',
        'Demo',
    ],

    'main.about_title' => [
        'Что такое MuraenaRF',
        'What is MuraenaRF',
    ],

    'main.architecture_alt' => [
        'Структурная схема системы MuraenaRF',
        'MuraenaRF system architecture diagram',
    ],

    'main.about_text' => [
        'MuraenaRF — аппаратно-программная платформа для дистанционного управления распределением ВЧ-сигнала. Команды передаются по общему коаксиальному тракту, а исполнительные блоки реагируют только на назначенные им адреса.',
        'MuraenaRF is hardware and software platform for remote RF signal distribution control. Commands travel through the existing coaxial network, while each output module responds only to its assigned address.',
    ],

    'main.problem_title' => [
        'Задача проекта',
        'Project goal',
    ],

    'main.problem_text' => [
        'Система создана для объектов, где требуется удалённо включать, отключать или предупреждать отдельные абонентские линии без прокладки дополнительных управляющих кабелей.',
        'The system is designed for facilities where it is necessary to remotely enable, disable, or issue alerts for individual subscriber lines without laying additional control cables.',
    ],


    'main.tx_title' => 'MuraenaTX',

    'main.tx_text' => [
        'Головной блок формирует команды и передаёт их в коаксиальную сеть.',
        'The head-end unit generates commands and injects them into the coaxial network.',
    ],

    'main.rx_title' => 'MuraenaRX',

    'main.rx_text' => [
        'Адресный исполнительный блок управляет восемью абонентскими отводами.',
        'An addressable output module controls eight subscriber taps.',
    ],

    'main.base_title' => 'MuraenaBase',

    'main.base_text' => [
        'WebUI для настройки адресов, команд, масок и состояния передатчика.',
        'A WebUI for addresses, commands, masks and transmitter state.',
    ],

    'main.features_title' => [
        'Основные принципы',
        'Core principles',
    ],

    'main.feature_1' => [
        'Передача управления по существующему коаксиальному тракту на частоте 320 MHz. Канал СК-22 должен быть свободен в вашей сети. [img=tx-spectrum.jpg]Модуляция GFSK с девиацией не более 30 кГц[/img]. Скорость передачи около 57.6 кбод.',
        'Control signal transmission via the existing coaxial path at a frequency of 320 MHz. The SK-22 channel must be available in your network. [img=tx-spectrum.jpg]GFSK modulation with a deviation of no more than 30 kHz[/img]. Transmission rate: approximately 57.6 kbaud.',
    ],

    'main.feature_2' => [
        'Индивидуальная адресация исполнительных модулей',
        'Individual addressing of output modules',
    ],

    'main.feature_3' => [
        'Независимое управление группами выходов через битовую маску',
        'Independent output groups controlled by a bit mask',
    ],

    'main.feature_4' => [
        'Открытая аппаратная и программная архитектура',
        'Open hardware and software architecture',
    ],

    'tx.menu' => 'MuraenaTX',

    'tx.title' => [
        'MuraenaTX — головной передающий блок',
        'MuraenaTX — head-end transmitter',
    ],

    'tx.subtitle' => [
        'Формирует адресные команды управления и вводит их в коаксиальный тракт.',
        'Generates addressable control commands and injects them into the coaxial network.',
    ],

    'tx.purpose_title' => [
        'Назначение',
        'Purpose',
    ],

    'tx.purpose_text' => [
        'MuraenaTX является центральным узлом системы.
        В общем смысле - это передатчик, формирующий адресные команды для исполнительных приёмников [url=/rx]MuraenaRX[/url] на частоте 320 MHz (SK-22).
        Модуляция GFSK с девиацией не более 30 кГц. Скорость передачи около 57.6 кбод. [img=tx-spectrum.jpg]Спектр сигнала[/img] показал достойные результаты в SDR-приёмнике и на вещаемые телеканалы сигнал передатчика никак не влияет.[br][br]
        Аппаратное ограничение в [url=/sources/CC1101.PDF]CC1101[/url] позволяет передавать не более 64 байт полезной нагрузки в одном RF-пакете. Поэтому MuraenaTX формирует один пакет с состояниями до 15 устройств:[br][code]TYPE + COUNT + (ADDR_H + ADDR_L + CMD + MASK) х 15 = 62 байта[/code].[br]
        Если приёмников в сети больше, то информация передаётся последовательными пакетами с учётом приоритета последних изменённых состояний.
        При максимальном количестве приёмников до 16384 (адреса [code]0000-3FFF[/code]) период полного цикла может составить несколько минут.
        Разумеется, если вы используете вменяемое количество исполнительных блоков (100-200 шт), то их обновление происходит гораздо быстрее - в течение нескольких первых секунд.',

        'MuraenaTX is the central node of the system.
        In general terms, it is a transmitter that generates addressable commands for [url=/rx]MuraenaRX[/url] receiver modules at a frequency of 320 MHz (SK-22).
        It uses GFSK modulation with a deviation of no more than 30 kHz. The data rate is approximately 57.6 kbaud. The [img=tx-spectrum.jpg]signal spectrum[/img] showed good results when observed with an SDR receiver and does not interfere with the broadcast television channels.[br][br]
        The hardware limitation of the [url=/sources/CC1101.PDF]CC1101[/url] allows no more than 64 bytes of payload to be transmitted in a single RF packet. Therefore, MuraenaTX creates one packet containing the states of up to 15 devices:[br][code]TYPE + COUNT + (ADDR_H + ADDR_L + CMD + MASK) x 15 = 62 bytes[/code].[br]
        If the network contains more receivers, their information is transmitted sequentially, with priority given to the most recently changed states.
        With the maximum supported number of 16,384 receivers using addresses [code]0000-3FFF[/code], practical tests showed that a complete update cycle takes slightly more than one minute.
        Naturally, when a reasonable number of output modules is used, such as 100-200 units, their states are updated much faster, within the first few seconds.',
    ],

    'tx.device_title' => [
        'Устройство',
        'Hardware',
    ],

    'tx.device_text' => [
        'Основой блока служит [img=muraenatx_scheme.jpg]микроконтроллер ESP32-C3 и ВЧ-трансивер CC1101[/img]. Модули соединены между собой по SPI-интерфейсу без использования лишнего провода ожидания передачи GDO0 от CC1101. В этом случае завершение передачи определяется программно через регистры [code]MARCSTATE[/code] и [code]TXBYTES[/code].
        Параметры передатчика, его текущее состояние и команды исполнительным блокам сохраняются в энергонезависимой памяти NVS.
        Управляется микроконтроллер ESP32-C3 посредством виртуального COM-порта, создаваемого при подключении к серверу [code]/dev/ttyACM0[/code].
        Параметры порта: 115200 бод, 8 бит данных, без контроля чётности, 1 стоп-бит. Команды передаются в виде текстовых строк с разделением полей пробелами и окончанием строки символом её перевода [code]\n[/code].[br][br]
        Передатчик может быть включён или отключён программно, а установленное состояние восстанавливается после перезапуска независимо от состояния сервера.
        Управление передатчиком может быть выполнено как через [url=/base]MuraenaBase[/url] (WebUI, API), так и через специально [url=/sources/MuraenaCOM/muraenacom]написанную[/url] утилиту [img=muraenacom.jpg]MuraenaCOM[/img].
        Мощность передатчика также регулируется программно [code]P=0...100[/code], что соответствует 73...113 dBµV на выходе блока при подключенной нагрузке 75 Ом.
        [br][br]
        Конструктивно схема собрана на печатной плате, помещённой в алюминиевый корпус размерами 80x54x23 мм. [url=/sources/MuraenaTX/MuraenaTX.lay6]Печатную плату[/url] несложно изготовить самостоятельно [img=muraenatx_pcb.jpg]травлением[/img], фрезеровкой или собрать на макетной плате.
        ',
        'The unit is based on an ESP32-C3 microcontroller and a CC1101 RF transceiver. Transmitter parameters and state are stored in non-volatile memory.',
    ],

    'tx.operation_title' => [
        'Принцип действия',
        'How it works',
    ],

    'tx.operation_text' => [
        'Каждый пакет содержит адрес исполнительного блока, код команды и восьмибитную маску. Передатчик может быть программно включён или отключён, а установленное состояние восстанавливается после перезапуска.',
        'Each packet contains an output module address, a command code and an eight-bit mask. The transmitter can be enabled or disabled in software and restores the saved state after restart.',
    ],

    'tx.protocol_title' => [
        'Формат команды',
        'Command format',
    ],

    'tx.protocol_example' => 'addr=0001 cmd=01 mask=11110000',

    'rx.menu' => 'MuraenaRX',

    'rx.title' => [
        'MuraenaRX — исполнительный блок',
        'MuraenaRX — output module',
    ],

    'rx.subtitle' => [
        'Управляемый делитель на восемь абонентских отводов.',
        'A controllable splitter with eight subscriber taps.',
    ],

    'rx.purpose_title' => [
        'Назначение',
        'Purpose',
    ],

    'rx.purpose_text' => [
        'Исполнительный блок устанавливается непосредственно в распределительной сети и управляет прохождением сигнала к восьми независимым абонентским линиям.',
        'The output module is installed directly in the distribution network and controls RF signal delivery to eight independent subscriber lines.',
    ],

    'rx.device_title' => [
        'Устройство',
        'Hardware',
    ],

    'rx.device_text' => [
        'В составе блока используются приёмник команд, микроконтроллер, ВЧ-ключи и пассивная часть делителя. Питание и управляющий сигнал могут поступать по общему коаксиальному кабелю.',
        'The module combines a command receiver, microcontroller, RF switches and a passive splitter section. Power and control data may share the same coaxial cable.',
    ],

    'rx.operation_title' => [
        'Принцип действия',
        'How it works',
    ],

    'rx.operation_text' => [
        'Блок принимает пакеты, проверяет собственный адрес и применяет восьмибитную маску. Каждый бит соответствует отдельному абонентскому отводу.',
        'The module receives packets, verifies its address and applies the eight-bit mask. Each bit represents one subscriber tap.',
    ],

    'rx.outputs_title' => [
        'Восемь управляемых выходов',
        'Eight controllable outputs',
    ],

    'rx.outputs_text' => [
        'Выходы могут переключаться независимо или группами одной командой. Это позволяет быстро менять конфигурацию распределительной сети.',
        'Outputs can be switched independently or in groups with a single command, allowing fast reconfiguration of the distribution network.',
    ],

    'base.menu' => 'MuraenaBase',

    'base.title' => [
        'MuraenaBase — панель управления',
        'MuraenaBase — control panel',
    ],

    'base.subtitle' => [
        'WebUI для настройки и контроля системы MuraenaRF.',
        'A WebUI for configuring and monitoring MuraenaRF.',
    ],

    'base.purpose_title' => [
        'Назначение',
        'Purpose',
    ],

    'base.purpose_text' => [
        'MuraenaBase предоставляет единый интерфейс для управления передатчиком и таблицей исполнительных адресов.',
        'MuraenaBase provides a single interface for controlling the transmitter and the table of output module addresses.',
    ],

    'base.functions_title' => [
        'Возможности',
        'Features',
    ],

    'base.function_1' => [
        'Просмотр и изменение адресов устройств',
        'View and edit device addresses',
    ],

    'base.function_2' => [
        'Настройка команд и битовых масок',
        'Configure commands and bit masks',
    ],

    'base.function_3' => [
        'Включение и отключение MuraenaTX',
        'Enable and disable MuraenaTX',
    ],

    'base.function_4' => [
        'Отображение объектов на карте',
        'Display installation objects on a map',
    ],
    'base.function_5' => [
        'API для интеграции с другими системами',
        'API for integration with other systems',
    ],

    'base.technology_title' => [
        'Технологии',
        'Technology',
    ],

    'base.technology_text' => [
        'Панель разрабатывалась как отдельное WebUI-приложение и взаимодействует с оборудованием через серверную часть проекта.',
        'The panel is developed as a standalone WebUI application and communicates with the project hardware through its backend.',
    ],

    'contact.menu' => [
        'Контакты',
        'Contact',
    ],

    'contact.title' => [
        'Связаться с автором',
        'Contact the author',
    ],

    'contact.subtitle' => [
        'Вопросы по проекту, предложения и техническое сотрудничество.',
        'Project questions, suggestions and technical cooperation.',
    ],

    'contact.author_title' => [
        'Автор проекта',
        'Project author',
    ],

    'contact.author_name' => [
        'Виталий Тумашевский',
        'Vitali Tumasheuski',
    ],

    'contact.email_title' => [
        'Электронная почта',
        'Email',
    ],

    'contact.email' => 'info@muraenarf.com',

    'contact.github_title' => [
        'Исходный код',
        'Source code',
    ],

    'contact.github_text' => [
        'Репозитории проекта публикуются на GitHub.',
        'Project repositories are published on GitHub.',
    ],

    'common.diy_level' => [
        'Сложность самостоятельного изготовления',
        'DIY build difficulty',
    ],

];