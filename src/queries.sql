


INSERT INTO roles (role_name) VALUES ('Заказчик'), ('Исполнитель');
INSERT INTO users (user_name, user_password, user_email, user_phone, user_city_id, user_role_id) VALUES 
('Павле Григорьевич', '125dkh', 'pavlo.greg.54@mail.ru', '+79253654857', 654, 1),
('Антонина', 'anR34', 'noTonyW@list.ru', "+79016521232",588, 2),
('GermanGerman', 'toto__284', 'GG_12_GG@gmail.com','+79105684565' ,536, 2),
('Елизавета Х.', 'i3dks88$', 'LizaNeLisa@mail.ru', '+79605242536',926, 2),
('Хомяк', '$dlo@23', 'KhomyakovStephan!2@rambler.ru', '+79087896545',722,1);

INSERT INTO statuses(status_name) VALUES ('Новое'), ('Отменено'),('В работе'),('Выполнено'),('Провалено');

INSERT INTO categories(category_name) VALUES ('Курьерские услуги'), ('Грузоперевозки'), ('Клининг'), ('Перевод'); 

INSERT INTO specialization (specialization_name) VALUES ('Ремонт бытовой техники'), ('Оператор ПК'), ('Курьер'), ('Уборщик'), ('Водитель'), ('Переводчик'), ('Частное лицо');

INSERT INTO tasks (task_title, task_details, task_locale_id, task_budget, task_files, task_category_id,   task_limit_date, task_user_id) VALUES 

    ('Перевести Войну и Мир на клингонский', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas varius tortor nibh, sit amet tempor nibh finibus et. Aenean eu enim justo. Vestibulum aliquam hendrerit molestie. Mauris malesuada nisi sit amet augue accumsan tincidunt', 536, '3400', 'img/WarAndPeace.pdf', 4, '2023-10-10 15:00',3),

    ('Перевозка животных', 'Необходимо перевезти двух котят к бабушке из Москвы в Зеленоград', 588, '1500', '', 1, '2023-09-03 00:00', 2),

    ('Уборка квартиры 40м2', 'Нужно убрать квартиру после ремонта в течение суток', 926, '5000', '', 3, '2023-09-07 21:00', 4);

INSERT INTO users_specialization (user_id, specialization_id) VALUES (1, 7), (2, 7), (2, 2), (1, 1), (3, 5), (4, 2), (4, 4), (4, 7), (5, 3), (5, 5); 