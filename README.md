Добавить токен бота Telegram в файл common\config\main-local.php

### Клонировать репозиторий
```
git clone git@github.com:maximishchenko/adminkmv.git
```

### Установить зависимости пакетов Composer
```
php composer.phar install
```

### Инициализировать окружение
```
php init
```

### Применить миграции БД
```
php yii migrate
```

### Создать пользователя
```
php yii users/create
```




!!! Note Только для окружения разработки (Должен быть установлени gulp с зависимостями, используемыми в gulpfile.js)
### Установка пакетов NodeJS
```
npm -i
```

### Генерация сжатых файлов ресурсов для frontend
```
php yii asset assets.php frontend/config/assets-prod.php
```

!!! Note Только в случае изменения svg-файлов в спрайте
### Генерация SVG-спрайтов
```
gulp svgSprite
```