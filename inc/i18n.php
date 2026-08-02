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
        'Передача управления по существующему коаксиальному тракту',
        'Control signal transmission via the existing coaxial path',
    ],

    'main.feature_2' => [
        'Индивидуальная адресация исполнительных модулей',
        'Individual addressing of output modules',
    ],

    'main.feature_3' => [
        'Низкое энергопотребление и режим сна',
        'Low power consumption and sleep mode',
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

    'tx.purpose_title' => [ 'Назначение', 'Purpose'],

    'tx.purpose_text' => [
        'MuraenaTX является центральным узлом системы.
        В общем смысле это передатчик, формирующий адресные команды для исполнительных приёмников [url=/rx]MuraenaRX[/url] на частоте около 320 MHz (SK-22).
        Используется модуляция GFSK с девиацией до 30 кГц и скоростью передачи 57.6 кбод. SDR-приёмник показал приемлемый [img=tx-spectrum.jpg]спектр сигнала[/img], который не оказывает влияния на телевизионные каналы, вещающие на других частотах.
        Реальная несущая частота передатчика может отличаться от установленной на несколько десятков килогерц. Для работы системы это не критично, поскольку приёмник команд [url=/rx]MuraenaRX[/url] имеет достаточно широкую полосу приёма — 270 кГц.',

        'MuraenaTX is the central node of the system.
        In general terms, it is a transmitter that generates addressable commands for [url=/rx]MuraenaRX[/url] receiver modules at a frequency of approximately 320 MHz (SK-22).
        It uses GFSK modulation with a deviation of up to 30 kHz and a data rate of 57.6 kbaud. An SDR receiver showed an acceptable [img=tx-spectrum.jpg]signal spectrum[/img], which does not noticeably affect television channels broadcasting on other frequencies.
        The actual carrier frequency of the transmitter may differ from the configured value by several tens of kilohertz. This is not critical for system operation because the [url=/rx]MuraenaRX[/url] command receiver has a sufficiently wide receive bandwidth of 270 kHz.',
    ],

    'tx.device_title' => [ 'Устройство', 'Hardware' ],

    'tx.device_text' => [
        'Основой блока служит [img=muraenatx_scheme.jpg]микроконтроллер ESP32-C3 и ВЧ-трансивер CC1101[/img].
        Модули соединены между собой по SPI, но без использования лишнего провода ожидания передачи GDO0 от CC1101. В этом случае завершение передачи определяется программно через регистры [code]MARCSTATE[/code] и [code]TXBYTES[/code].
        [br][br]
        Конструктивно схема [img=muraenatx_examples.jpg]собрана на печатной плате[/img], помещённой в алюминиевый корпус размерами 80x54x23 мм. [url=/sources/MuraenaTX/MuraenaTX.lay6]Печатную плату[/url] несложно изготовить [img=muraenatx_pcb.jpg]самостоятельно[/img] травлением, [img=muraenatx_milling.jpg]фрезеровкой[/img] или собрать [img=muraenatx_proto.jpg]на макетной плате[/img].[br][br]
        Контроллер прошивается через среду Arduino IDE ([url=/sources/MuraenaTX/]файлы[/url]) или с помощью утилиты ESPTOOL:
    [code]sudo apt update
sudo apt install esptool
wget https://muraenarf.com/sources/MuraenaTX/build/esp32.esp32.esp32c3/MuraenaTX.ino.merged.bin
esptool --chip esp32c3 --port /dev/ttyACM0 --baud 921600 write-flash 0x0 MuraenaTX.ino.merged.bin
[/code]
        После успешной прошивки, светодиод [code]DATA[/code] начнёт мигать с частотой около 5 Гц, что означает установленную связь с CC1101 и успешную передачу на выход RF-пакетов.[br][br]
        Параметры передатчика, его текущее состояние и команды исполнительным блокам сохраняются в энергонезависимой памяти NVS.
        Управляется микроконтроллер ESP32-C3 посредством виртуального COM-порта, создаваемого при подключении к серверу [code]/dev/ttyACM0[/code].
        Параметры порта: 115200 бод, 8 бит данных, без контроля чётности, 1 стоп-бит. Команды передаются в виде текстовых строк с разделением полей пробелами и окончанием строки символом её перевода [code]\n[/code].[br][br]
        Передатчик может быть включён или отключён программно, а установленное состояние восстанавливается после перезапуска независимо от состояния сервера.
        Управление осуществляется как через [url=/base]MuraenaBase[/url] (WebUI, API), так и через специально [url=/sources/MuraenaCOM/muraenacom]написанную[/url] утилиту [img=muraenacom.jpg]MuraenaCOM[/img].
        Мощность передатчика регулируется программно [code]P=0...100[/code], что соответствует 73...113 dBµV на выходе блока при подключенной нагрузке 75 Ом.
        Для практической работы и измерений на сети удобно использовать [img=muraenatester.jpg]простой тестер сигнала[/img] с индикаторами уровня и статуса приёма команд ([img=muraenatester_schematic.jpg]схема[/img], [url=/sources/MuraenaTester/]исходные файлы прошивки[/url]).
        ',

        'The unit is based on an [img=muraenatx_scheme.jpg]ESP32-C3 microcontroller and a CC1101 RF transceiver[/img].
        The modules are connected via SPI without using the additional GDO0 transmission-complete signal from the CC1101. In this configuration, the end of transmission is detected in software through the [code]MARCSTATE[/code] and [code]TXBYTES[/code] registers.
        [br][br]
        The circuit is [img=muraenatx_examples.jpg]assembled on a printed circuit board[/img] installed in an aluminium enclosure measuring 80x54x23 mm. The [url=/sources/MuraenaTX/MuraenaTX.lay6]printed circuit board[/url] can be manufactured [img=muraenatx_pcb.jpg]independently[/img] by etching, [img=muraenatx_milling.jpg]milling[/img], or the circuit can be assembled [img=muraenatx_proto.jpg]on a prototyping board[/img].[br][br]
        The controller can be flashed using the Arduino IDE ([url=/sources/MuraenaTX/]project files[/url]) or with the ESPTOOL utility:
    [code]sudo apt update
sudo apt install esptool
wget https://muraenarf.com/sources/MuraenaTX/build/esp32.esp32.esp32c3/MuraenaTX.ino.merged.bin
esptool --chip esp32c3 --port /dev/ttyACM0 --baud 921600 write-flash 0x0 MuraenaTX.ino.merged.bin
[/code]
        After successful flashing, the [code]DATA[/code] LED will start blinking at approximately 5 Hz. This indicates that communication with the CC1101 has been established and RF packets are being transmitted successfully.[br][br]
        The transmitter parameters, its current state, and commands for the output modules are stored in NVS non-volatile memory.
        The ESP32-C3 microcontroller is controlled through a virtual COM port created when the device is connected to the server: [code]/dev/ttyACM0[/code].
        The serial port settings are 115200 baud, 8 data bits, no parity, and 1 stop bit. Commands are transmitted as text lines with space-separated fields and terminated by the newline character [code]\n[/code].[br][br]
        The transmitter can be enabled or disabled in software, and the selected state is restored after a restart independently of the server state.
        The transmitter can be controlled either through [url=/base]MuraenaBase[/url] using its WebUI and API, or through the specially [url=/sources/MuraenaCOM/muraenacom]developed[/url] [img=muraenacom.jpg]MuraenaCOM[/img] utility.
        The transmitter output power is adjusted in software over the range [code]P=0...100[/code], corresponding to approximately 73...113 dBµV at the unit output with a 75-ohm load connected.
        ',
    ],


    'tx.protocol_title' => [
        'Формат команды',
        'Command format',
    ],

    'tx.protocol_example' => [
        'Аппаратное ограничение [url=/sources/CC1101.PDF]CC1101[/url] позволяет передавать не более 64 байт полезной нагрузки в одном RF-пакете. Поэтому MuraenaTX формирует один пакет, содержащий состояния до 15 устройств:[br][code]TYPE + COUNT + (ADDR_H + ADDR_L + CMD + MASK) × 15 = 62 байта[/code].[br]
        Если приёмников в сети больше, информация передаётся последовательными пакетами с учётом приоритета последних изменённых состояний.
        При максимальном количестве приёмников — 16 384 устройства с адресами [code]0000-3FFF[/code] — период полного цикла может составлять несколько минут.
        Если используется разумное количество исполнительных блоков, например 100-200 устройств, их состояния обновляются значительно быстрее — в течение нескольких секунд.[br][br]
        Основные команды взаимодействия по COM-порту с MuraenaTX:
[code]LIST                              - показать список адресов и их состояний
ADDR=0001                         - показать состояние адреса 0001
ADDR=0001 MASK=01010101           - установить маску 01010101 для адреса 0001
ADDR=0001 CMD=00 MASK=01010101    - установить маску 01010101 и команду 00 для адреса 0001
ADDR=0001 CMD=01010101 MASK=4A    - установить маску 4A и команду 01010101 для адреса 0001
SLEEP                             - показать состояние режима сна
SLEEP=ON                          - включить режим сна для всех адресов
SLEEP=OFF                         - отключить режим сна для всех адресов
ADDR=0000 NEWADDR=0001            - изменить адрес 0000 на 0001
DELETE=0001                       - удалить адрес 0001
DELETE=ALL                        - удалить все адреса
RESET                             - перезапустить систему
ON / OFF                          - включить или выключить передатчик
TX?                               - запросить состояние передатчика
P=0..100                          - установить мощность передатчика в процентах
HELP                              - показать справку[/code]
        Служебный параметр CMD является необязательным и по умолчанию равен [code]0x00[/code]. Он может использоваться для передачи дополнительной информации исполнительным блокам, например для включения режима «предупреждение абонента», при котором выход отключается на 3 секунды каждую минуту.[br][br]
        Использование низкоуровневого протокола по COM-порту имеет смысл, только когда требуется интеграция с другими системами, например с SCADA. Для обычной работы достаточно использовать WebUI [url=/base]MuraenaBase[/url].',

        'The hardware limitation of the [url=/sources/CC1101.PDF]CC1101[/url] allows no more than 64 bytes of payload to be transmitted in a single RF packet. Therefore, MuraenaTX creates one packet containing the states of up to 15 devices:[br][code]TYPE + COUNT + (ADDR_H + ADDR_L + CMD + MASK) × 15 = 62 bytes[/code].[br]
        If the network contains more receivers, the information is transmitted in consecutive packets, with priority given to the most recently changed states.
        With the maximum supported number of 16,384 receivers using addresses [code]0000-3FFF[/code], a complete update cycle may take several minutes.
        When a reasonable number of output modules is used, such as 100-200 devices, their states are updated much faster, within several seconds.[br][br]
        Main commands for interacting with MuraenaTX via the COM port:
[code]LIST                              - show the list of addresses and their states
ADDR=0001                         - show the state of address 0001
ADDR=0001 MASK=01010101           - set mask 01010101 for address 0001
ADDR=0001 CMD=00 MASK=01010101    - set mask 01010101 and command 00 for address 0001
ADDR=0001 CMD=01010101 MASK=4A    - set mask 4A and command 01010101 for address 0001
SLEEP                             - show the sleep mode status
SLEEP=ON                          - enable sleep mode for all addresses
SLEEP=OFF                         - disable sleep mode for all addresses
ADDR=0000 NEWADDR=0001            - change address 0000 to 0001
DELETE=0001                       - delete address 0001
DELETE=ALL                        - delete all addresses
RESET                             - restart the system
ON / OFF                          - enable or disable the transmitter
TX?                               - request the transmitter status
P=0..100                          - set the transmitter power as a percentage
HELP                              - show help[/code]
        The CMD service parameter is optional and defaults to [code]0x00[/code]. It can be used to transmit additional information to output modules, for example to enable a subscriber warning mode that disables the output for 3 seconds once every minute.[br][br]
        Using the low-level protocol by COM-port is only necessary when integration with other systems, such as SCADA, is required. For regular operation, it is sufficient to use the [url=/base]MuraenaBase[/url] WebUI.',
    ],


    

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

    'base.photo_alt' => [
        'Программа MuraenaBase',
        'MuraenaBase program',
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
        'MuraenaBase предоставляет единый интерфейс для управления передатчиком [url=/tx]MuraenaTX[/url] и таблицей адресов исполнительных приёмников [url=/rx]MuraenaRX[/url]. Ознакомиться с интерфейсом можно в [url=https://demo.muraenarf.com]демо-версии[/url].',
        'MuraenaBase provides a single interface for controlling the transmitter [url=/tx]MuraenaTX[/url] and the table of output module addresses [url=/rx]MuraenaRX[/url]. You can familiarize yourself with the interface in the [url=https://demo.muraenarf.com]demo version[/url].',
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
        'Отображение исполнительных приёмников на карте',
        'Display output modules on a map',
    ],
    'base.function_5' => [
        'API для интеграции с другими системами',
        'API for integration with other systems',
    ],

    'base.technology_title' => [
        'Установка и запуск',
        'Installation',
    ],

'base.technology_text' => [
    'Вы можете самостоятельно скомпилировать исполняемый файл [url=/sources/MuraenaBase/muraenabase]muraenabase[/url] из исходного кода, используя [url=/sources/MuraenaBase/]файлы проекта[/url].
    Перед компиляцией необходимо установить Go (v1.26), Node.js (v24.15) и сервер баз данных MySQL.[br]
    Скачайте директорию проекта и запустите скрипт сборки в терминале Linux:
    [code]mkdir -p ./MuraenaBase && cd ./MuraenaBase && \
wget --mirror \
  --no-parent \
  --no-host-directories \
  --cut-dirs=2 \
  --reject "index.html*" \
  --exclude-directories="/sources/MuraenaBase/frontend/node_modules" \
  https://muraenarf.com/sources/MuraenaBase/ && \
chmod +x ./make && \
./make
./muraenabase[/code]

    При первом запуске программы мастер настройки предложит выбрать порт, на котором будет работать веб-интерфейс, подтвердить создание юнита systemd для постоянной работы приложения в фоновом режиме, а также попытается создать базу данных `mbase` с пользователем `mbase` и паролем `mbase`.
    После успешного запуска веб-интерфейса вы сможете войти в систему с учётной записью суперпользователя — логин `root`, пароль `root`. После входа можно создать пользователей системы и изменить пароль суперпользователя на более безопасный.',

    'You can compile the [url=/sources/MuraenaBase/muraenabase]muraenabase[/url] executable from the source code using the [url=/sources/MuraenaBase/]project files[/url].
    Before compiling, install Go (v1.26), Node.js (v24.15), and a MySQL database server.[br]
    Download the project directory and run the build script in a Linux terminal:
    [code]mkdir -p ./MuraenaBase && cd ./MuraenaBase && \
wget --mirror \
  --no-parent \
  --no-host-directories \
  --cut-dirs=2 \
  --reject "index.html*" \
  --exclude-directories="/sources/MuraenaBase/frontend/node_modules" \
  https://muraenarf.com/sources/MuraenaBase/ && \
chmod +x ./make && \
./make
./muraenabase[/code]

    On the first launch, the setup wizard will ask you to choose the port on which the web interface will run, confirm the creation of a systemd unit so that the application can run continuously in the background, and attempt to create the `mbase` database with the username `mbase` and password `mbase`.
    After the web interface starts successfully, you can sign in using the superuser account with the username `root` and password `root`. Once signed in, you can create system users and change the superuser password to a more secure one.',
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
        'Виталий Тумашевский[br]Телеграм: [url=https://t.me/unidiag]@unidiag[/url]',
        'Vitali Tumasheuski[br]Telegram: [url=https://t.me/unidiag]@unidiag[/url]',
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
        '[url=/sources/]/sources/[/url] и на [url=https://github.com/unidiag]GitHub[/url] автора.',
        '[url=/sources/]/sources/[/url] and on the author\'s [url=https://github.com/unidiag]GitHub[/url].',
    ],

    'common.diy_level' => [
        'Сложность самостоятельного изготовления',
        'DIY build difficulty',
    ],



    'common.copy_code' => [
        'Копировать код',
        'Copy code',
    ],

    'common.code_copied' => [
        'Скопировано',
        'Copied',
    ],


];