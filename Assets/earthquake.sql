create table earthquake
(
    id int auto_increment
        primary key,
    date date not null,
    time date not null,
    latitude float not null,
    longitude float not null,
    depth float not null,
    scale varchar(255) not null,
    location varchar(255) not null,
    hash text null
);

