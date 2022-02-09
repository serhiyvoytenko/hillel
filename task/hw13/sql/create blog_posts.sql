CREATE TABLE blog_posts
(
    id      INT auto_increment PRIMARY KEY ,
    title   VARCHAR(100) NOT NULL ,
    user_id INT          NOT NULL ,
    text    TEXT         NOT NULL ,
    created DATETIME     NOT NULL ,
    updated DATETIME     NOT NULL ,
    CONSTRAINT blog_posts_blog_users_id_fk FOREIGN KEY (user_id) REFERENCES blog_users (id)
            ON UPDATE CASCADE ON DELETE CASCADE
);

