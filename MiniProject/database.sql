CREATE TABLE users(
    id int(11) PRIMARY KEY AUTO_INCREMENT,
    first_name varchar(200) null,
    last_name varchar(200) null,
    email varchar(150) not null,
    username varchar(50) not null,
    password varchar(50) not null,
    role ENUM('admin', 'staff', 'user') NOT NULL DEFAULT 'user',
    status int(1)
);

INSERT INTO users(email, username, password, role) VALUES
	('admin@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
    ('user@gmail.com', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user')
;

CREATE TABLE categories (
    id int(11) PRIMARY KEY AUTO_INCREMENT,
    name varchar(200) NOT NULL,
    description text null,
    slug varchar(200) UNIQUE null,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)

-- CREATE TABLE tags (
--     id int(11) PRIMARY KEY AUTO_INCREMENT,
--     name varchar(200) NOT NULL,
--     description text null,
--     slug varchar(200) UNIQUE null,
--     created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
--     updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
-- )

CREATE TABLE posts (
    id int(11) PRIMARY KEY AUTO_INCREMENT,
    title varchar(200) NOT NULL,
    slug varchar(200) UNIQUE not null,
    excerpt text null,
    content LONGTEXT not null,
    thumbnail varchar(200) null,
    author_id int(11) not null,
    category_id int(11) not null,
    status ENUM('draft', 'published', 'archived') NOT NULL DEFAULT 'draft',
    views int(11) DEFAULT 0,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    published_at DATETIME null,
    FOREIGN KEY (author_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE
)

-- CREATE TABLE post_tags (
--     post_id int(11) not null,
--     tag_id int(11) not null,
--     PRIMARY KEY (post_id, tag_id),
--     FOREIGN KEY (post_id) REFERENCES posts(id) ON DELETE CASCADE,
--     FOREIGN KEY (tag_id) REFERENCES tags(id) ON DELETE CASCADE
-- );

-- CREATE TABLE comments (
--     id int(11) PRIMARY KEY AUTO_INCREMENT,
--     post_id int(11) not null,
--     user_id int(11) not null,
--     content text not null,
--     status ENUM('pending', 'approved', 'spam') NOT NULL DEFAULT 'pending',
--     created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
--     updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
--     FOREIGN KEY (post_id) REFERENCES posts(id) ON DELETE CASCADE,
--     FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
-- )

INSERT INTO categories (name, slug, description, created_at, updated_at)
VALUES
('Technology', 'technology', 'Các bài viết về công nghệ và xu hướng mới.', '2025-07-01 09:00:00', '2025-07-01 09:00:00'),
('Lifestyle', 'lifestyle', 'Chia sẻ phong cách sống, thói quen lành mạnh.', '2025-07-01 09:10:00', '2025-07-01 09:10:00'),
('Travel', 'travel', 'Kinh nghiệm du lịch, review địa điểm nổi tiếng.', '2025-07-01 09:20:00', '2025-07-01 09:20:00'),
('Food', 'food', 'Cẩm nang ẩm thực, công thức nấu ăn.', '2025-07-01 09:30:00', '2025-07-01 09:30:00'),
('Education', 'education', 'Kiến thức học tập, kỹ năng mềm.', '2025-07-01 09:40:00', '2025-07-01 09:40:00'),
('Health', 'health', 'Sức khỏe, thể dục, và dinh dưỡng.', '2025-07-01 09:50:00', '2025-07-01 09:50:00');


-- INSERT INTO tags (name, slug)
-- VALUES
-- ('Python', 'python'),
-- ('PHP', 'php'),
-- ('MySQL', 'mysql'),
-- ('JavaScript', 'javascript'),
-- ('ReactJS', 'reactjs'),
-- ('NodeJS', 'nodejs'),
-- ('Docker', 'docker'),
-- ('Microservices', 'microservices'),
-- ('HTTPS', 'https'),
-- ('Cloud', 'cloud');

INSERT INTO posts (title, slug, content, excerpt, thumbnail, author_id, category_id, views, status, published_at)
VALUES
-- Bài viết 1
('Hướng dẫn học PHP cơ bản', 'huong-dan-hoc-php-co-ban',
 'Bài viết này hướng dẫn bạn học PHP từ cơ bản đến nâng cao với ví dụ thực tế...',
 'Học PHP từ cơ bản đến nâng cao, phù hợp cho người mới bắt đầu.',
 'https://cdn.hostadvice.com/2023/04/final-php-basics-building-dynamic-web-applications-from-scratch-0.png.webp', 1, 1, 120, 'published', '2025-07-01 10:00:00'),

-- Bài viết 2
('Lifestyle mùa hè năng động', 'lifestyle-mua-he-nang-dong',
 'Cách để có một mùa hè năng động và đầy năng lượng, từ thói quen buổi sáng đến chế độ ăn uống...',
 'Tips sống năng động hơn vào mùa hè.',
 'https://example.com/images/summer-lifestyle.jpg', 2, 2, 85, 'published', '2025-07-02 14:30:00'),

-- Bài viết 3
('Top 10 điểm du lịch Việt Nam 2025', 'top-10-diem-du-lich-viet-nam-2025',
 'Khám phá 10 địa điểm du lịch hot nhất tại Việt Nam trong năm 2025 mà bạn không nên bỏ lỡ...',
 'Danh sách địa điểm du lịch nổi bật 2025.',
 'https://example.com/images/vietnam-travel.jpg', 3, 3, 300, 'published', '2025-07-03 09:15:00'),

-- Bài viết 4
('Công thức nấu món Phở chuẩn vị', 'cong-thuc-nau-mon-pho-chuan-vi',
 'Hướng dẫn cách nấu Phở Hà Nội chuẩn vị, thơm ngon, đậm đà...',
 'Cách nấu Phở Hà Nội chuẩn vị và ngon.',
 'https://example.com/images/pho-recipe.jpg', 4, 4, 200, 'published', '2025-07-04 16:45:00'),

-- Bài viết 5
('Học ReactJS cho người mới', 'hoc-reactjs-cho-nguoi-moi',
 'ReactJS là thư viện mạnh mẽ để xây dựng giao diện web hiện đại. Bài viết này sẽ giúp bạn bắt đầu...',
 'Hướng dẫn học ReactJS từ A-Z cho người mới.',
 'https://example.com/images/reactjs-guide.jpg', 1, 1, 150, 'published', '2025-07-05 11:20:00');

