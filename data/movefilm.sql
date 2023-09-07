-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th5 25, 2023 lúc 03:19 AM
-- Phiên bản máy phục vụ: 8.0.31
-- Phiên bản PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `movefilm`
CREATE DATABASE movefilm;
USE movefilm;
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `country`
--

DROP TABLE IF EXISTS `country`;
CREATE TABLE IF NOT EXISTS `country` (
  `country_id` int NOT NULL AUTO_INCREMENT,
  `country_name` varchar(100) NOT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `country`
--

INSERT INTO `country` (`country_id`, `country_name`) VALUES
(1, 'Âu Mỹ'),
(2, 'Việt Nam'),
(3, 'Nhật Bản'),
(4, 'Hàn Quốc'),
(5, 'Phim Mỹ'),
(6, 'Trung Quốc');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `genres`
--

DROP TABLE IF EXISTS `genres`;
CREATE TABLE IF NOT EXISTS `genres` (
  `theloai_id` int NOT NULL AUTO_INCREMENT,
  `ten_theloai` varchar(50) NOT NULL,
  PRIMARY KEY (`theloai_id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `genres`
--

INSERT INTO `genres` (`theloai_id`, `ten_theloai`) VALUES
(1, 'Kinh Dị'),
(2, 'Khoa Học Viễn Tưởng'),
(4, 'Lãng Mạn'),
(5, 'Giật Gân'),
(6, 'Phiêu Lưu'),
(7, 'Phim Cổ Trang'),
(8, 'Võ Thuật'),
(11, 'Hoạt Hình'),
(12, 'Tâm Lý - Tình Cảm'),
(13, 'Gia Đình'),
(14, 'Hoạt Hình | Anime'),
(17, 'Tình Tiết'),
(16, 'Hình Sự  - Chiến Tranh'),
(18, 'Hành Động - Phiêu Lưu');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `movies`
--

DROP TABLE IF EXISTS `movies`;
CREATE TABLE IF NOT EXISTS `movies` (
  `movie_id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` text,
  `release_year` year DEFAULT NULL,
  `language` varchar(50) DEFAULT NULL,
  `country_id` int DEFAULT NULL,
  `link1` varchar(255) DEFAULT NULL,
  `link2` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `view` int DEFAULT NULL,
  `date_add` date DEFAULT NULL,
  PRIMARY KEY (`movie_id`),
  KEY `country_id` (`country_id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `movies`
--

INSERT INTO `movies` (`movie_id`, `title`, `description`, `release_year`, `language`, `country_id`, `link1`, `link2`, `img`, `view`, `date_add`) VALUES
(8, 'Nhà Bà Nữ', 'Phim Hay Việt Nam', 2023, 'Việt Nam', 2, 'oA-BhGNK7qw', 'K592lRAEWrk', 'hinh0.jpg', 3, '2023-05-19'),
(9, 'Mắt biếc', 'Đi qua những đau khổ và phản bội, mối tình đơn phương của Ngạn dành cho cô bạn thân thời thơ ấu Hà Lan kéo dài cả một thế hệ trong bộ phim siêu lãng mạn này.', 2019, 'Việt Nam', 3, 'ohaWKWsIRFg', 'Q7dUAekILHs', 'hinh1.jpg', 1, '2023-05-14'),
(10, 'ShaZam! Cơn Thị Nộ Của Các Vị Thần', 'ShaZam! Cơn Thị Nộ Của Các Vị Thần\",Phim Shazam! Cơn Thịnh Nộ Của Các Vị Thần - Shazam! Fury of the Gods: xoay quanh sự trở lại của \" cậu nhóc \" siêu anh hùng Shazam không còn tự tin vào chính mình, vì cho rằng mình chỉ là 1 đứa nhóc, không oai vệ, bản lĩnh như các siêu anh hùng khác như The Flash nhanh như chóp, hay cao to cỡ Aquanman, hoặc oai hùng thông minh như Batman,..Vì Shazam vốn chỉ là cậu nhóc ẩn mình trong vóc dáng của siêu anh hùng cao to, vụng về thiếu kiểm soát khả năng siêu nhiên của mình. Tuy nhiên lần này vò giải cứu thế giới Shazam đã nổi dận thực sự trừng trị cho thế lực siếu ác 1 bài học.', 2023, 'Tiếng Việt', 5, 'link1', 'Hc-D3I72T1w', 'SHAZAM!.jpg', 2, '2023-05-12'),
(11, 'Harry Potter And Goblet Of Fire', 'Harry Potter thấy mình đang thi đấu trong một giải đấu nguy hiểm giữa các trường phép thuật đối thủ, nhưng cậu bị phân tâm bởi những cơn ác mộng tái diễn, đối đầu trực diện với voldermort, liệu harry sẽ làm thế nào ?', 1999, 'Tiếng Anh', 5, 'link1', 'vnv2hiocu54', 'hinh2.jpg', 2, '2023-05-17'),
(13, 'Tôi Thấy Hoa Vàng Trên Cỏ Xanh', 'Tôi thấy hoa vàng trên cỏ xanh là phim điện ảnh được chuyển thể từ tiểu thuyết cùng tên của nhà văn Nguyễn Nhật Ánh. Bộ phim do Victor Vũ đạo diễn, được hợp tác sản xuất bởi Galaxy Media & Entertainment, Saigon Concert, PS Việt Nam, Hãng phim Phương Nam & Truyền hình K+ với sự đầu tư của Cục Điện ảnh Việt Nam.', 2015, 'Tiếng Việt', 2, 'link1', 'Pq8yKqAEEfM', 'hinh4.jpg', 0, '2023-05-19'),
(17, 'Vệ Binh Dải Ngân Hà -  Tập Full Guardians Of The Galaxy (2014)', 'Vệ Binh Dải Ngân Hà - Guardians Of The Galaxy là bộ phim khoa học viễn tưởng mang đậm chất hành động phiêu lưu Mỹ năm 2014 của đạo diễn James Gunn. Bộ phim chính là một siêu phẩm bom tấn được đón chờ rất nhiều trong năm của hãng Marvels. Sự khác biệt lần này là biệt đội hoàn toàn mới, lạ và dị từ khắp nơi trong dải ngân hà. Biệt đội gồm các thành viên là một tay thám hiểm vũ trụ - Peter Quill, một con gấu trúc Mỹ lạm dụng súng - Rocket, một người hình cây - Groot, một nữ sát thủ da xanh - Gamora, và một chiến binh huỷ diệt - Drax. Một nhiệm vụ khá quen của đội là giải cứu thế giới khỏi nguy cơ huỷ diệt dưới Thanos, kẻ có quyền lực và mạnh nhất trong vũ trụ đó. Một nhiệm vụ khó khăn cùng bao nhiêu thử thách gian nan. Liệu vệ binh ấy có giải cứu được dải Ngân hà?', 2014, 'Tiếng Anh', 1, 'lnk1', '_Rb6ugju_X0', 'hinh6.jpg', 0, '2023-05-19'),
(18, 'Chiến Binh Báo Đen - Black Panther', 'Chiến Binh Báo Đen - Black Panther kể về T’Challa (Black Panther) là hoàng tử, một nhà sáng chế tài ba của đất nước Wakanda nằm tại Châu Phi, nơi sở hữu nguồn kim loại cực hiếm: vibranium. Với nguồn tài nguyên giàu có cùng sự tiến bộ vượt bậc, Wakanda trở thành mục tiêu tấn công của nhiều quốc gia, đế chế suốt vài thiên niên kỷ, mục đích của những kẻ xâm lược là giành được số vũ khí khủng khiếp và của cải ở đất nước giàu có này. Là người đứng đầu đất nước, hoàng tử T’Challa sẽ phải bảo vệ người dân của mình khỏi những mưu đồ từ nước ngoại bang. Sở hữu khả năng tác chiến nhanh nhạy, bộ giáp và móng vuốt bằng vibranium, có thể nói Black Panther cũng là một siêu anh hùng trong thế giới Marvel.', 2018, 'Tiếng Việt', 1, 'kmdsk', 'dMBjbnmaq0M', 'hinh5.jpg', 0, '2023-05-19'),
(19, 'BIỆT ĐỘI SIÊU ANH HÙNG 4: HỒI KẾT - Endgame ', 'Biệt Đội Siêu Anh Hùng 4: Hồi Kết - Avengers: Endgame: Cú búng tay của Thanos đã khiến toàn bộ dân số biến mất một nửa. Các siêu anh hùng đánh mất bạn bè, người thân và đánh mất cả chính mình. Bộ sáu Avengers đầu tiên tứ tán. Iron Man kẹt lại ngoài không gian, Hawkeye mất tích. Thor, Captain America, Hulk và Black Widow đều chìm trong nỗi đau vô tận vì mất đi những người thân yêu. Họ phải làm gì để cứu vãn mọi chuyện ở Avengers: Hồi Kết? Điều khán giả quan tâm nhất hiện nay chính là ai sẽ còn sống và ai sẽ ra đi khi Avengers: Endgame kết thúc.\r\n\r\nCaptain America là người có khả năng ra đi cao nhất khi Chris Evans đã tuyên bố từ bỏ chiếc áo Đại Úy Mỹ. Iron Man Tony Stark- người mở đầu của vũ trụ điện ảnh Marvel cũng có khả năng “bay màu” tương tự. Thor sau tội lỗi “không nhắm vào đầu” cũng thuộc danh sách nguy hiểm. Những người duy nhất chắc chắn còn sống sau Avengers: Hồi Kết là Nick Fury, Maria Hill và cậu bé Người Nhện Peter Parker. Ngoài ra, vai trò của chị Đại Captain Marvel với sức mạnh khủng khiếp trong câu chuyện này là gì? Câu trả lời sẽ có trong Avengers: Endgame.', 2019, 'Tiếng Việt', 1, 'link1', 'Bhm2YXwiwnY', 'endgame.jpg', 0, NULL),
(20, ' Tay Đấm Huyền Thoại 3', 'Adonis đã phát triển mạnh trong cả sự nghiệp và cuộc sống gia đình, nhưng khi một người bạn thời thơ ấu và cựu thần đồng quyền anh tái xuất, cuộc đối đầu không chỉ là một cuộc chiến.', 2023, 'Tiếng Việt', 1, 'chưa có', 'JXNROmq2ZWY', 'taydamhuyenthoai3.jpg', 0, '2023-05-11'),
(21, ' LÍNH BẮN TỈA QUẠ TRẮNG 2022', 'The White Raven (2022) Lính Bắn Tỉa Quạ Trắng kể về sau khi hứng chịu thảm kịch dưới bàn tay của những người lính xâm lược ở Donbas, một giáo viên vật lý người Ukraine tìm cách trả thù. Anh ta đặt mục tiêu vào một tay súng bắn tỉa ưu tú của Nga, người mà việc loại bỏ có thể thay đổi cục diện của cuộc xung đột.', 2022, 'Tiếng Việt', 1, 'link1', 'yuluphIYsx0', 'linhbantiaquatrang.jpg', 1, '2023-05-02'),
(22, 'Hòn đảo của Giovanni', 'Sau hậu quả của cuộc xung đột tàn khốc nhất mà nhân loại từng trải qua, hòn đảo nhỏ bé Shikotan đã trở thành một phần của Tỉnh Sakhalin... và trên đường biên giới chưa được hàn gắn ở nơi xa xôi này của thế giới, tình bạn giữa những đứa trẻ từ hai quốc gia khác nhau đã chớm nở, phấn đấu vượt qua rào cản ngôn ngữ và những sóng gió của lịch sử. Được truyền cảm hứng bởi những sự kiện có thực.', 2014, 'Tiêng Việt', 3, 'C31zMTcs7Es', 'link2', 'hondaocuaGiovanni.jpg', 5, '2023-05-01'),
(23, ' HÒN ĐẢO HUYỀN BÍ - JOURNEY 2 ', 'Hòn đảo huyền bí là bộ phim hài hước, phiêu lưu và viễn tưởng định dạng 3D năm 2012 của Mỹ do Brad Peyton làm đạo diễn, nó là phần tiếp theo của phim viễn tưởng năm 2008 Journey to the Center of the Earth. Phim cũng dựa theo một tiểu thuyết của Jules Verne mang tên The Mysterious Island.', 2012, 'Tiếng Việt', 1, 'link1', 'dP6QiE-LOsc', 'hondaohuyenbi.jpg', 0, '2023-05-30'),
(24, 'Ngộ Không Kỳ Truyện | 2017', 'Đây không phải là chương nào của Tây Du Ký ,đây là truyện của Ngộ Không,Ngộ Không lúc ấy (Bành Vu Yến đóng vai) không phải là tề thiên đại thánh mà chấn động trời đất,hắn chỉ là một con khỉ bướng bỉnh không chịu phục tùng.Thiên đình phá hủy Hoa Qủa Sơn của hắn để khống chế số phận của chúng sinh,hắn thì quyết định chống với thiên đình,phá hủy tất cả giới luật.Tất cả sư việc mà họ làm, là hăng hái sôi nổi không hiểu trời cao đất dày hay là tuyệt vọng kiềm chế do khoong thể thảy đổi số phận?Chẳng lẽ số phận chắc là đã định trước? Ngộ Không không chịu,hắn lại vẫy một lần nữa Gậy như ý, làm cho tất cả các phật đều biến mất.', 2017, 'Tiếng Việt', 6, 'K0Ofn9v1pcM', 'XuGawtxIOsQ', 'ngokhongkytruyen.jpg', 11, '2023-05-19'),
(25, 'Tây Du Ký: Nguyệt Quang Bảo Hộp', 'Giới thiệu: Loạt phim Hồng Kông nhất định phải xem, một trong những bộ phim tình cảm được yêu thích nhất trong làn điện ảnh Hoa Ngữ! Cho dù Nguyệt Quang Bảo Hộp có thể vượt qua thời gian, nhưng tình yêu mất đi có thể có được một cách thuận lợi không?', 1995, 'Tiếng Việt', 6, '02escM-hBwU', '8S5iCgporTk', 'tonngokhongchautinhtri.jpg', 0, '2023-05-19'),
(26, 'TẦNG LỚP ITEAWON Full 1-16', 'Tại một khu phố nhộn nhịp của Seoul, một cựu tù nhân và bạn bè mình chiến đấu với đối thủ khó nhằn để biến tham vọng quán bar đường phố của họ thành hiện thực.', 2020, 'Tiếng Việt', 4, 'DNHK6ujTDmU', 'DNHK6ujTDmU', 'tanglopitewon.jpg', 2, '2023-05-19'),
(27, 'Châu Tinh Trì Thánh Bài 2', 'Thần Bài 2 (God of Gamblers 2, tên khác là Đổ Hiệp) ra mắt năm 1990 ở Hong Kong và gây được tiếng vang lớn, góp phần đưa Châu Tinh Trì từ chàng diễn viên không mấy tên tuổi trở thành ngôi sao nổi tiếng đình đám Hong Kong.\r\n\r\nPhim kể câu chuyện về chàng trai lông bông Châu Tinh Tổ nhờ có công năng đặc biệt dấn thân vào sòng bài và giúp đỡ Trần Đao Tử thắng đối thủ. Phim quy tụ dàn diễn viên Châu Tinh Trì, Lưu Đức Hoa, Trương Mẫn, Trần Pháp Dung... Châu Nhuận Phát đóng vai khách mời, chỉ xuất hiện ở một cảnh quay.', 1990, 'Tiếng Việt', 6, 'bxEw6yJBeL0', 'OxbOcm3gU_8', 'thanhbai2.jpg', 15, '2023-05-19'),
(28, 'Già Gân Báo Thù - Sisu (2023)', 'Bối cảnh phim diễn ra vào cuối năm 1944 vào thời chiến tranh Lapland tại Phần Lan. Aatami Korpi là một nhà thám hiểm sống ẩn mình ở vùng hoang dã Lapland với chú ngựa và chú chó trung thành của mình. Đến một ngày, Aatami đào được một khối vàng lớn nằm sâu dưới các lớp đất đá. Ông ta quyết định đưa khối vàng lên ngựa và hướng đến thị trấn gần nhất.\r\nTuy nhiên, trên đường đi Aatami chạm trán với một trung đội thuộc nhóm quân Đức Quốc Xã. Khi khám xét ngựa và hành lí của ông, bọn lính phát hiện ra số vàng và tính cướp đoạt tất cả. Trong lúc định giết chết Aatami, bọn lính đã bị ông giết sạch bằng những đòn tấn công tàn bạo.\r\nKhi biết được điều này, Bruno - tên cầm đầu của quân Đức Quốc Xã tiến hành truy sát Aatami. Và hắn cũng phát hiện ra Aatami đã từng là một đặc công Phần Lan. Ông ta đã mất hết gia đình và quê hương sau cuộc Chiến tranh mùa đông. Với lòng căm hận, Aatami trút cơn thịnh nộ lên bọn lính tàn bạo. Phần còn lại của phim tiếp tục xoay quanh cuộc rượt đuổi gay cấn giữa ông và kẻ thù.', 2022, 'Tiếng Việt', 1, 'link1', 'LlS15rihUhk', 'sisu.jpg', 1, '2023-05-19'),
(29, 'SPIDER MAN: FAR FROM HOME', 'Spider-Man: Far From Home đấy. Trở lại sau sự ra đi của người chú Tony – Iron Man, có vẻ như cậu bé Peter đã không còn đủ động lực, niềm tin để tiếp tục theo đuổi giấc mơ làm siêu anh hùng. Nhưng đời đâu phải lúc nào cũng như ý ta mong muốn! Nhất là khi ở ngoài kia, vẫn còn vô vàn kẻ xấu khác cần tiêu diệt. Trong chuyến du lịch đến châu Âu, Peter Parker và những người bạn của mình rơi vào rắc rối mới. Không những vậy, cậu còn được diện kiến Nick Fury. Liệu thử thách mới của Spider-Man sẽ khó khăn đến mức độ nào? Dù gan to cúp điện thoại của Nick Fury Peter vẫn phải hợp tác cùng ông để tiếp tục hành trình bảo vệ thế giới của chú Tony. Bên cạnh Nick Fury, Spider-Man: Far From Home còn có sự xuất hiện của một gương mặt mới là Mysterio. Liệu đây sẽ là nhân vật phản diện hay chính diện?\r\n\r\n', 2019, 'Tiếng Việt', 1, 'link1', '0A4tMLQ56XM', 'spider-man.jpg', 0, '2023-05-19'),
(30, 'LÂU ĐÀI BAY CỦA HOWL|| AI RỒI CŨNG SẼ TÌM ĐƯỢC MỘT NGƯỜI MÌNH MUỐN CHE CHỞ CẢ ĐỜI', 'Bộ phim bắt đầu với cảnh Sophia, một cô gái trẻ rất chăm chỉ làm việc tại cửa hàng bán mũ nón của gia đình, đang ngồi kiên nhẫn trên băng ghế khi những cột khói đen cuồn cuộn bốc ra từ những đoàn tàu hỏa đi qua khung cửa sổ. Trên đường đi thăm cô em gái, Sophie bị những tên lính cao to trêu ghẹo và được một phù thủy có khả năng biến hình tên là Howl cứu thoát. Sự việc này khiến Phù thủy Witch of the Waste tức giận bởi cô ta vốn có cảm tình với Howl, để tự xoa dịu sự ghen tị tức tối của mình, Witch of the Waste ám một lời nguyền độc đoán khiến Sophie trở thành một bà lão già nua xấu xí 90 tuổi.', 2014, 'Tiếng Việt', 3, 'link1', 'aNFYdyTj9aA', 'ladaihowl.jpg', 1, '2023-05-19'),
(31, 'KUNGFU PANDA PHẦN 1', 'Po là một chú gấu trúc béo mũm mĩm và cực mê kungfu. Nhưng vấn đề ở chỗ cậu chàng lại là kẻ lười biếng nhất thung lũng Thanh Bình. Mọi chuyện hoàn toàn thay đổi khi con báo tuyết gian ác Tai Lung được ra tù. Hắn ráo riết lên kế hoạch tấn công thung lũng. Và người anh hùng được chọn để chiến đấu chống lại Tai Lung, không ai khác chính là Po béo. Một đội ngũ hùng hậu những bậc thầy kungfu được huy động để hướng dẫn Po những miếng võ cơ bản nhất…', 2008, 'Tiếng Việt', 3, 'HoqthRJTpIM', '1ns0Osj9bHg', 'kunfupanda1.jpg', 0, '2023-05-19'),
(32, 'KUNGFU PANDA PHẦN 3', 'Ngay sau sự kiện của phần hai, Shifu từ bỏ nhiệm vụ chủ nhân của Cung điện Ngọc Bích cho Po, tuyên bố rằng bước tiếp theo trong quá trình học việc của mình là giám sát quá trình đào tạo của Furious Five. Trong khi vật lộn với trách nhiệm mới này, Po vui mừng khi đoàn tụ với cha ruột của mình, Li, mặc dù ông Ping ít nhiệt tình hơn.', 2016, 'Tiếng Việt', 3, 'PgxY_m5wj7M', 'PgxY_m5wj7M', 'kungfupanda3.jpg', 1, '2023-05-19'),
(33, 'KUNGFU PANDA PHẦN 2', 'Cuộc sống của Po hiện tại đẹp như một giấc mơ: trở thành Thần Long Đại Hiệp, bảo vệ Thung Lũng Yên Bình cùng với những người bạn và các sư huynh và sư tỷ kung fu đồng môn là Ngũ Đại Hào Kiệt. Thế nhưng, cuộc sống mới của Po bỗng dưng bị đe dọa với sự xuất hiện của một thế lực đen tối khủng khiếp. Hắn sử dụng một vũ khí bí mật và không có gì ngăn chặn nổi, nhằm xâm chiếm Trung Hoa và hủy diệt hoàn toàn môn võ kung fu. Po và The Furious Five phải có một cuộc hành trình băng qua lục địa Trung Hoa nhằm tiêu diệt thế lực xấu xa đó. Nhưng làm thế nào Po có thể chặn đứng một thứ vũ khí mà nó có thể chặn đứng tuyệt đỉnh kung fu?', 2011, 'Tiếng Việt', 3, 'byoNiDpj3WY', 'byoNiDpj3WY', 'panda2.jpg', 0, '2023-05-19'),
(34, 'Thứ 6 Ngày 13', '\r\nVới những sự kiện kinh hoàng xảy ra ở cuối phần 2 khi mà Ginny đối đầu với Jason. Cô bị tên sát nhân lao vào từ cửa sổ tấn công và lôi đi. Ginny bất tỉnh ngay sau đó. Đến khi tỉnh lại thì thấy cảnh sát đã đến đưa cô ấy vào bệnh viện cấp cứu. Còn số phận của người bạn trai Paul vẫn là 1 ẩn số. Tên sát nhân Jason với khuôn mặt dị dạng, tuy rằng bị thương nặng khi bị Ginny dùng cây rựa chém vào vai, hắn vẫn sống sót và đến một cửa hàng nhỏ gần đó, tìm kiếm quần áo mới để thay. Cặp vợ chồng Edna và Harold bị Jason sát hại rất dã man. Người chồng bị hắn dùng con dao lớn, băm thẳng vào ngực. Sau đó khống chế Edna từ phía sau rồi dùng chính cây kim đan lớn của người phụ nữ xấu số đâm từ sau gáy lên trước. Jason sau đó đến một khu nhà ven hồ tên là Higgins Haven để lẩn trốn.\r\nVừa hay, có 1 nhóm thanh niên trẻ đang trên đường đến đó để nghỉ dưỡng nhân dịp cuối tuần. Báo hiệu một cuộc tàn sát đẫm máu nữa chuẩn bị diễn ra.', 1980, 'Tiếng Việt', 1, 'F4YLI0rsnrA', 'F4YLI0rsnrA', '220px-Fridaythe13th2009.jpg', 0, '2023-05-19'),
(37, ' NGƯỜI HÙNG TIA CHỚP || THE FLASH TẬP 1 2 3 ', 'Trong một lần tại Starling City, Barry đã vô tình bị ảnh hưởng bởi vụ nổ phòng thí nghiệm của S.T.A.R khiến anh bị bất tỉnh nhiều ngày trong bệnh viện. Khi tỉnh dậy, anh ta đã phát hiện ra rằng mình có khả năng đặc biệt đó là tăng tốc độ cơ thể và di chuyển siêu nhanh. Kể từ đây, huyền thoại về người anh hùng Flash bắt đầu!', 2020, 'Tiếng Việt', 1, 'ANlJwhlHWDg', 'ANlJwhlHWDg', 'nguohungtiachop.jpg', 1, '2023-05-22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `movie_genre`
--

DROP TABLE IF EXISTS `movie_genre`;
CREATE TABLE IF NOT EXISTS `movie_genre` (
  `movie_id` int NOT NULL,
  `theloai_id` int NOT NULL,
  PRIMARY KEY (`movie_id`,`theloai_id`),
  KEY `theloai_id` (`theloai_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `movie_genre`
--

INSERT INTO `movie_genre` (`movie_id`, `theloai_id`) VALUES
(8, 12),
(8, 13),
(8, 17),
(9, 4),
(9, 12),
(10, 6),
(11, 5),
(11, 6),
(12, 12),
(12, 13),
(13, 4),
(17, 2),
(17, 6),
(18, 2),
(19, 2),
(19, 8),
(20, 8),
(21, 12),
(21, 15),
(21, 16),
(22, 6),
(22, 11),
(23, 2),
(23, 6),
(24, 2),
(24, 8),
(24, 12),
(24, 17),
(25, 7),
(25, 12),
(26, 4),
(26, 12),
(27, 18),
(28, 18),
(29, 2),
(29, 18),
(30, 14),
(31, 14),
(32, 14),
(33, 14),
(34, 1),
(34, 17),
(37, 2),
(37, 18);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `review_id` int NOT NULL AUTO_INCREMENT,
  `movie_id` int NOT NULL,
  `user_id` int NOT NULL,
  `rating` int NOT NULL,
  `comment` text,
  `review_date` datetime DEFAULT NULL,
  PRIMARY KEY (`review_id`),
  KEY `movie_id` (`movie_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `role` int DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `fullname`, `role`) VALUES
(1, 'rangdong0903', '0903', 'rangdong09032002@gmail.com', 'Administrator', 1),
(7, 'thuyvy0405', '0405', 'thuyvy040502@gmail.com', 'Thúy Vy', 0),
(8, 'chicuong123', '1234', 'chicuong@gmail.com', 'Cường Đô La ', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `watchlist`
--

DROP TABLE IF EXISTS `watchlist`;
CREATE TABLE IF NOT EXISTS `watchlist` (
  `watchlist_id` int NOT NULL AUTO_INCREMENT,
  `movie_id` int NOT NULL,
  `user_id` int NOT NULL,
  `added_date` datetime DEFAULT NULL,
  PRIMARY KEY (`watchlist_id`),
  KEY `movie_id` (`movie_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `watchlist`
--

INSERT INTO `watchlist` (`watchlist_id`, `movie_id`, `user_id`, `added_date`) VALUES
(37, 17, 1, '2023-05-23 00:00:00'),
(38, 8, 1, '2023-05-23 00:00:00'),
(36, 25, 8, '2023-05-23 00:00:00'),
(35, 26, 7, '2023-05-23 00:00:00'),
(42, 24, 7, '2023-05-23 00:00:00'),
(32, 27, 7, '2023-05-23 00:00:00'),
(33, 25, 7, '2023-05-23 00:00:00'),
(31, 24, 8, '2023-05-23 00:00:00'),
(20, 9, 1, '2023-05-23 00:00:00'),
(24, 17, 7, '2023-05-23 00:00:00'),
(22, 30, 1, '2023-05-23 00:00:00'),
(23, 25, 1, '2023-05-23 00:00:00'),
(25, 18, 7, '2023-05-23 00:00:00'),
(26, 13, 7, '2023-05-23 00:00:00'),
(39, 27, 1, '2023-05-23 00:00:00'),
(40, 27, 8, '2023-05-23 00:00:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
