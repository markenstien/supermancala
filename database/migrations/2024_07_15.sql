create table games(
    id int(10) not null primary key auto_increment,
    game_code varchar(100),
    game_title varchar(100),
    game_description text,
    game_status enum('active', 'hidden', 'maintenance') default 'active',
    wallpaper_id int(10),
    profile_picture_id int(10),
    created_at timestamp default now()
);


create table user_played_games(
    id int(10) not null primary key auto_increment,
    game_id int(10),
    user_id int(10),
    last_played_dt datetime,
    played_count tinyint comment 'how many times this user played this game'
);

create table game_scores(
    id int(10) not null primary key auto_increment,
    game_id int(10),
    user_id int(10),
    game_score decimal(10, 2),
    last_played_dt datetime
);

create table game_total_scores(
    id int(10) not null primary key auto_increment,
    game_id int(10),
    user_id int(10),
    game_score_total decimal(10,2),
    game_count tinyint comment 'total of games played on this score',
    last_played_dt datetime
);