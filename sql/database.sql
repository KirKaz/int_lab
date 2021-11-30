create table users(
    user_id serial not null unique ,
    mail varchar not null unique,
    pass varchar not null,
    name varchar,
    login varchar not null unique ,
    birthday_date date,
    city varchar,
    about varchar,
    primary key (user_id)
);

