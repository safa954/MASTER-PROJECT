create table contact_us
(
    contact_id int auto_increment
        primary key,
    full_name  varchar(30) null,
    email      varchar(30) null,
    message    text        null
);

create table gas_station
(
    station_id   int auto_increment
        primary key,
    name         varchar(500) not null,
    phone_number varchar(150) not null,
    address      varchar(600) not null
);

create table mechanic
(
    mechanic_id  int auto_increment
        primary key,
    first_name   varchar(600) not null,
    last_name    varchar(600) not null,
    email        varchar(500) not null,
    address      varchar(600) not null,
    phone_number varchar(200) not null,
    constraint email
        unique (email)
);

create table products
(
    product_id   int auto_increment
        primary key,
    user_id      int                                             not null,
    title        varchar(255)                                    not null,
    description  text                                            not null,
    file_name    varchar(255)                                    not null,
    phone_number varchar(255)                                    not null,
    price        double                                          not null,
    status       enum ('available', 'solid') default 'available' not null
);

create table transport_truck
(
    trans_truck_id int auto_increment
        primary key,
    name           varchar(500) not null,
    phone_number   varchar(100) not null,
    address        varchar(600) not null
);

create table users
(
    user_id   int auto_increment
        primary key,
    full_name varchar(255) not null,
    email     varchar(255) not null,
    phone_num varchar(255) not null,
    role_type varchar(255) not null,
    address   varchar(255) not null,
    username  varchar(255) not null,
    password  varchar(255) not null,
    constraint username_uni
        unique (username)
);

