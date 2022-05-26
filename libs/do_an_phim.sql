-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 26, 2022 lúc 06:58 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `do_an_phim`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(30) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Phim thuyết minh'),
(2, 'Phim hài hước'),
(3, 'Phim chiến tranh'),
(4, 'Phim âm nhạc'),
(5, 'Phim thiếu nhi'),
(6, 'Phim hoạt hình'),
(7, 'Phim thần thoại'),
(8, 'Phim TV Show'),
(9, 'Phim hành động'),
(10, 'Phim phiêu lưu'),
(11, 'Phim viễn tưởng'),
(12, 'Phim bí mật điện ảnh'),
(13, 'Phim Võ Thuật '),
(14, 'Phim Kinh Dị'),
(15, 'Phim Hài Việt'),
(16, 'Phim Cổ Trang'),
(17, 'Phim Tâm Lý'),
(18, 'Phim Hình Sự'),
(19, 'Phim Khoa học Tài liệu');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `episode`
--

CREATE TABLE `episode` (
  `id` int(11) NOT NULL,
  `film_id` int(11) NOT NULL,
  `episode` int(10) NOT NULL,
  `episode_name` varchar(20) CHARACTER SET utf8 NOT NULL,
  `content` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `episode`
--

INSERT INTO `episode` (`id`, `film_id`, `episode`, `episode_name`, `content`) VALUES
(4, 130, 1, '1', 'images/video/Spy x Family trailer 2 chính thức - [Việt Sub].mp4'),
(11, 129, 0, '1', 'images/video/Tên Cậu Là Gì- - Your Name - IMDb.mp4'),
(12, 131, 0, '1', 'images/video/OVA Hẹn Ước 3 Năm - Medusa Hiện Thân - Đấu Tông Xuất Hiện -- Trailer Đấu Phá Thương Khu'),
(13, 125, 2, '1', 'images/video/Phù Thủy Tối Thượng Trong Đa Vũ Trụ Hỗn Loạn - Doctor Strange 2 (teaser trailer) - Khởi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `film`
--

CREATE TABLE `film` (
  `id` int(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `name2` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `director` varchar(100) NOT NULL,
  `actor` varchar(100) NOT NULL,
  `category_id` int(2) NOT NULL,
  `type_movie` int(20) NOT NULL,
  `nation_id` int(100) NOT NULL,
  `year` int(4) NOT NULL,
  `image` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `duration` int(5) NOT NULL,
  `num_view` int(11) NOT NULL,
  `author` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `film`
--

INSERT INTO `film` (`id`, `name`, `name2`, `status`, `director`, `actor`, `category_id`, `type_movie`, `nation_id`, `year`, `image`, `description`, `duration`, `num_view`, `author`) VALUES
(123, 'NGƯỜI NHỆN: KHÔNG CÒN NHÀ', 'Spider-Man: No Way Home', 'Hoàn tất', 'JON WATTS', 'Không xác định', 9, 3, 1, 2021, 'images/spider-man.jpg', 'Với Danh Tính Của Người Nhện Giờ đã được Tiết Lộ, Peter Nhờ Doctor Strange Giúp đỡ. Khi Một Câu Thần Chú Bị Sai, Những Kẻ Thù Nguy Hiểm Từ Các Thế Giới Khác Bắt đầu Xuất Hiện, Buộc Peter Phải Khám Phá Ra ý Nghĩa Thực Sự Của Việc Trở Thành Người Nhện. Lần đầu tiên trong lịch sử điện ảnh của Người Nhện, thân phận người hàng xóm thân thiện bị lật mở, khiến trách nhiệm làm một Siêu Anh Hùng xung đột với cuộc sống bình thường và đặt người anh quan tâm nhất vào tình thế nguy hiểm. Khi anh nhờ đến giúp đỡ của Doctor Strange để khôi phục lại bí mật, phép thuật đã gây ra lỗ hổng thời không, giải phóng những ác nhân mạnh mẽ nhất từng đối đầu với Người Nhện từ mọi vũ trụ. Bây giờ, Peter sẽ phải vượt qua thử thách lớn nhất của mình, nó sẽ thay đổi không chỉ tương lai của chính anh mà còn là tương lai của cả Đa Vũ Trụ.', 148, 34100, 'Không xác định'),
(125, 'PHÙ THỦY TỐI THƯỢNG TRONG ĐA VŨ TRỤ HỖN LOẠN', 'Doctor Strange in the Multiverse of Madness', 'Hoàn tất', 'Sam Raimi', 'Benedict Cumberbatch, Elizabeth Olsen Rachel McAdams', 11, 3, 1, 2022, 'images/Doctor_Strange.jpg', 'Sau các sự kiện của Avengers: Endgame, Tiến sĩ Stephen Strange tiếp tục nghiên cứu về Viên đá Thời gian. Nhưng một người bạn cũ đã trở thành kẻ thù tìm cách tiêu diệt mọi phù thủy trên Trái đất, làm xáo trộn kế hoạch của Strange và cũng khiến anh ta mở ra một tội ác khôn lường', 126, 10000, 'LV Tâm'),
(127, 'DORAEMON: NOBITA VÀ CUỘC CHIẾN VŨ TRỤ TÍ HON', 'DORAEMON: NOBITA AND THE MINIMAL WAR OF THE UNIVERSITY', 'Hoàn tất', 'Yamaguchi Susumu', 'Subaru Kimura, Megumi Oohara, Megumi Oohara, Kakazu Yumi, Seki Tomokazu', 6, 1, 4, 2022, 'images/doraemon.jpg', 'Nobita tình cờ gặp được người ngoài hành tinh tí hon Papi, vốn là Tổng thống của hành tinh Pirika, chạy trốn tới Trái Đất để thoát khỏi những kẻ nổi loạn nơi quê nhà. Doraemon, Nobita và hội bạn thân dùng bảo bối đèn pin thu nhỏ biến đổi theo kích cỡ giống Papi để chơi cùng cậu bé. Thế nhưng, một tàu chiến không gian tấn công cả nhóm. Cảm thấy có trách nhiệm vì liên lụy mọi người, Papi quyết định một mình đương đầu với quân phiến loạn tàn ác. Doraemon và các bạn lên đường đến hành tinh Pirika, sát cánh bên người bạn của mình.', 109, 3601, 'Không xác định'),
(128, 'Nghề siêu dễ', 'Extremely easy job', 'Hoàn tất', 'Võ Thanh Hòa', 'Hứa Vĩ Văn, Thu Trang, Kiều Minh Tuấn, Tiến Luật, Huỳnh Phương, Quang Tuấn, Vũ Ngọc Anh, Thanh Mỹ', 2, 1, 2, 2022, 'images/nsd.jpg', 'Ông Thái là một cảnh sát về hưu nhưng không chịu an phận thủ thường, hàng ngày vẫn đi tìm bắt tội phạm vặt trong xóm cho đỡ nhớ nghề. Một ngày kia, Hoàng - tên trùm ma túy mới ra tù bỗng dưng chuyển đến xóm ông và mở một văn phòng bất động sản. Nghi ngờ đây là nơi làm ăn phi pháp, ông Thái quyết định âm thầm điều tra. Ông mua lại tiệm cơm tấm đối diện trụ sở của Hoàng để làm nơi theo dõi, đồng thời thu nạp Thu - Phú - Vinh - Mèo, đám thanh niên “bất hảo” trong xóm về quán hỗ trợ buôn bán để rảnh tay \"phá án\". Trớ trêu thay, tiệm cơm bất ngờ nổi tiếng và ăn nên làm ra, khiến cho \"chuyên án đặc biệt\" của ông đứng trước nguy cơ đổ bể.', 113, 9999, 'LV Tâm'),
(129, 'Tên cậu là gì?', 'Your Name?', 'Hoàn tất', 'Shinkai Makoto', 'Không xác định', 6, 1, 4, 2016, 'images/your-name.jpg', 'Your Name là một bộ phim về phép màu và tình yêu, kể về câu chuyện của cặp đôi thường xuyên bị hoán đổi cơ thể và nổ lực cứu lấy nữ chính khỏi thảm cảnh, cũng như nổ lực nhớ lấy tên đối phương', 120, 50000, 'NV Phuoc'),
(130, 'Spy X Family', 'Spy X Family', 'Tập 7', 'FURUHASHI KAZUHIRO', 'Không xác định', 6, 2, 4, 2022, 'images/spyxfamily.jpg', 'Mỗi người đều có một phần bí mật của mình mà họ không thể cho ai khác biết.Vào thời điểm mà tất cả các quốc gia trên thế giới đang tham gia vào một cuộc chiến tranh thông tin khốc liệt xảy ra sau những cánh cửa đóng kín, Ostania và Westalis đã ở trong tình trạng chiến tranh lạnh với nhau trong nhiều thập kỷ.Bộ phận Tập trung vào phía Đông của Dịch vụ Tình báo Westalis (WISE) cử điệp viên tài năng nhất của họ, \"Twilight\", theo mật vụ tối mật để điều tra các chuyển động của Donovan Desmond, chủ tịch Đảng Thống nhất Quốc gia của Ostania, người đang đe dọa các nỗ lực hòa bình giữa hai quốc gia.Nhiệm vụ này được gọi là \"Chiến dịch Strix.\"Nó bao gồm \"tập hợp một gia đình trong một tuần để xâm nhập vào các cuộc tụ họp xã hội được tổ chức bởi ngôi trường ưu tú mà con trai Desmond theo học.\"\"Twilight\" lấy nhân dạng của bác sĩ tâm thần Loid Forger và bắt đầu tìm kiếm các thành viên trong gia đình. Nhưng Anya, cô con gái mà anh nhận nuôi, hóa ra lại có khả năng đọc được suy nghĩ của mọi người, tr', 23, 2693, 'NV Phuoc'),
(131, 'Đấu Phá Thương Khung OVA - Hẹn Ước 3 Năm', 'Fights Break Sphere OVA 3', '13/13', 'không xác định', 'không xác định', 13, 2, 7, 2021, 'images/dptk.png', 'Ba năm trước, Thiếu tông chủ Vân Lam Tông Nạp Lan Yên Nhiên tự ý hủy hôn. Tiêu Viêm – người chịu sự sỉ nhục đó đã lập Ước Hẹn Ba Năm với Nạp Lan Yên Nhiên. Vì ước hẹn này, Tiêu Viêm tu luyện không ngừng nghỉ. Rèn luyện từ sơn mạch Ma Thú đến sa mạc Tháp Qua Nhĩ, từ luyện đan đến chịu sự đau đớn khi nuốt dị hỏa, đều là vì để chứng minh câu nói đó: Ba Mươi Năm Hà Đông, Ba Mươi Năm Hà Tây, Mạc Khi Thiếu Niên Cùng ( Sông có khúc, người có lúc; Đừng khinh thiếu niên quá đáng) Giờ đây, đàn ông Tiêu gia lấy khó khăn để vươn lên, mãi không lùi bước. Sự trưởng thành của Tiêu Viêm vẫn đang tiếp tục…', 20, 8024, 'NV Phuoc'),
(132, 'Thương ngày nắng về', '', 'tập 1', 'Vũ Trường Khoa,Bùi Tiến Huy', 'Thanh Quý,Lan Phương,Hồng Đăng,Phan Minh Tuyền, Đình Tú...', 8, 2, 2, 2021, 'images/tnnv.jpg', 'Thương ngày nắng về xoay quanh gia đình bà Nga (NSƯT Thanh Quý) bán bún riêu sống cùng cậu em trai không được thông minh và ba cô con gái. Là một người phụ nữ góa chồng bước vào độ tuổi 60 nhưng tâm trí của bà vẫn chưa hề an yên khi ba cô con gái dẫu đã lớn khôn nhưng luôn đầy những khúc mắc trong cuộc sống. Dù hay lắm điều, cằn nhằn, nóng nảy, nhưng với đức hi sinh và tình yêu thương vô hạn, bà luôn là một điểm tựa vững vàng cho em trai và những cô con gái của mình', 60, 1000, 'NV Phuoc');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nation`
--

CREATE TABLE `nation` (
  `id` int(11) NOT NULL,
  `name` varchar(30) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `nation`
--

INSERT INTO `nation` (`id`, `name`) VALUES
(1, 'Mỹ'),
(2, 'Việt Nam'),
(3, 'Pháp'),
(4, 'Nhật Bản'),
(5, 'Hàn Quốc'),
(6, 'Anh'),
(7, 'Trung Quốc'),
(8, 'Ấn Độ'),
(9, 'Hồng Kông '),
(10, 'Thái Lan');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nav-menu`
--

CREATE TABLE `nav-menu` (
  `id` int(20) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `handle` varchar(30) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `nav-menu`
--

INSERT INTO `nav-menu` (`id`, `name`, `handle`) VALUES
(1, 'thể loại', 'category'),
(2, 'quốc gia', 'nation'),
(3, 'phim lẻ', 'single-movie'),
(4, 'phim bộ', 'series-movie'),
(5, 'phim chiếu rạp', 'theater-movie');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `series-movie`
--

CREATE TABLE `series-movie` (
  `id` int(20) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `year` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `series-movie`
--

INSERT INTO `series-movie` (`id`, `name`, `year`) VALUES
(1, 'Phim Bộ 2018', 2018),
(2, 'Phim Bộ 2017', 2017),
(3, 'Phim Bộ 2016', 2016),
(4, 'Phim Bộ 2015', 2015);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `single-movie`
--

CREATE TABLE `single-movie` (
  `id` int(20) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `year` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `single-movie`
--

INSERT INTO `single-movie` (`id`, `name`, `year`) VALUES
(1, 'Phim Lẻ 2018', 2018),
(2, 'Phim Lẻ 2017', 2017),
(3, 'Phim Lẻ 2016', 2016),
(4, 'Phim Lẻ 2015', 2015);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theater-movie`
--

CREATE TABLE `theater-movie` (
  `id` int(20) NOT NULL,
  `name` varchar(255) CHARACTER SET utf32 NOT NULL,
  `year` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `theater-movie`
--

INSERT INTO `theater-movie` (`id`, `name`, `year`) VALUES
(1, 'Phim Chiếu Rạp 2018', 2018),
(2, 'Phim Chiếu Rạp 2017', 2017),
(3, 'Phim Chiếu Rạp 2016', 2016),
(4, 'Phim Chiếu Rạp 2015', 2015);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type-movie`
--

CREATE TABLE `type-movie` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `handle` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `type-movie`
--

INSERT INTO `type-movie` (`id`, `name`, `handle`) VALUES
(1, 'Phim lẻ', 'single-movie'),
(2, 'Phim bộ', 'series-movie'),
(3, 'Phim chiếu rạp', 'theater-movie');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `ID` int(5) NOT NULL,
  `username` varchar(30) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `birthday` date NOT NULL,
  `sex` varchar(10) NOT NULL,
  `usertype` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`ID`, `username`, `fullname`, `password`, `email`, `birthday`, `sex`, `usertype`) VALUES
(9, 'tamlv', 'Le Van Tam', '$2y$10$EjPiBb8zT9.rDYuS/mwdm.Y3unFtqaUHHE9ZtPHLnudAUt94v.qca', 'levantamdhcn@gmail.com', '2001-05-06', 'male', 99),
(10, 'nguyendangthai', 'Nguyen Dang Thai', '$2y$10$ZbpSn6CE0OQWyI8t5n/pcOGLKtDohCkT1edSB.UuVixV5rZehfJtu', 'thainguyen@gmail.com', '2001-05-06', 'male', 20);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `usertype`
--

CREATE TABLE `usertype` (
  `type` int(2) NOT NULL,
  `typename` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `usertype`
--

INSERT INTO `usertype` (`type`, `typename`) VALUES
(10, 'Guest'),
(20, 'Member'),
(99, 'Admin');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `episode`
--
ALTER TABLE `episode`
  ADD PRIMARY KEY (`id`,`film_id`),
  ADD KEY `film_id` (`film_id`);

--
-- Chỉ mục cho bảng `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nation_id` (`nation_id`),
  ADD KEY `category` (`category_id`),
  ADD KEY `type_movie` (`type_movie`);

--
-- Chỉ mục cho bảng `nation`
--
ALTER TABLE `nation`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nav-menu`
--
ALTER TABLE `nav-menu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `series-movie`
--
ALTER TABLE `series-movie`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `single-movie`
--
ALTER TABLE `single-movie`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `theater-movie`
--
ALTER TABLE `theater-movie`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `type-movie`
--
ALTER TABLE `type-movie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `handle` (`handle`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_ibfk_1` (`usertype`);

--
-- Chỉ mục cho bảng `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`type`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `episode`
--
ALTER TABLE `episode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `film`
--
ALTER TABLE `film`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT cho bảng `nation`
--
ALTER TABLE `nation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `nav-menu`
--
ALTER TABLE `nav-menu`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `series-movie`
--
ALTER TABLE `series-movie`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `single-movie`
--
ALTER TABLE `single-movie`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `theater-movie`
--
ALTER TABLE `theater-movie`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `type-movie`
--
ALTER TABLE `type-movie`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `episode`
--
ALTER TABLE `episode`
  ADD CONSTRAINT `episode_ibfk_1` FOREIGN KEY (`film_id`) REFERENCES `film` (`id`);

--
-- Các ràng buộc cho bảng `film`
--
ALTER TABLE `film`
  ADD CONSTRAINT `film_ibfk_1` FOREIGN KEY (`nation_id`) REFERENCES `nation` (`id`),
  ADD CONSTRAINT `film_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `film_ibfk_3` FOREIGN KEY (`type_movie`) REFERENCES `type-movie` (`id`);

--
-- Các ràng buộc cho bảng `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`usertype`) REFERENCES `usertype` (`type`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
