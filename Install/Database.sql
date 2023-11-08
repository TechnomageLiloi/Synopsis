create table synopsis_night_at_mars
(
    key_note varchar(500) not null,
    title varchar(1000) not null,
    status tinyint unsigned default 1 not null,
    note text not null,
    position tinyint unsigned default 1 not null
);

create unique index synopsis_night_at_mars_key_synopsis_uindex
    on synopsis_night_at_mars (key_note);

alter table synopsis_night_at_mars
    add constraint synopsis_night_at_mars_pk
        primary key (key_note);

