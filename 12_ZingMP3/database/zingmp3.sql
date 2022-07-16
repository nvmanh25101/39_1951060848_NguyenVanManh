-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 19, 2022 at 08:17 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zingmp3`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `level` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `image`, `gender`, `phone`, `level`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$HlolXs97T2oBvYt2WWlZP.r/ieGfzuZZY9yepzcI4eVA5.KecEKjO', 'admin.jpg', 1, '0123456789', 1),
(4, 'Đỗ Phương', 'phuongnn@gmail.com', '$2y$10$.yy.pj/HN5dFnmrd6AvqcOV6Ki5Zu6vYVGx2DMXA1O4NYdGVjbSYS', 'admin_1642220503.jpg', 0, '0244142142', 0),
(5, 'Nguyễn Hải Quân', 'nguyenhaiquan@gmail.com', '$2y$10$ZZWt9.w0J3d2k.ccNa10eO0qJKELXkGCNWX9w0tOPUtUIuIJsmH1G', 'admin_1641803527.jpg', 1, '0978978992', 0),
(6, 'Nguyễn Thùy Ninh', 'nguyenthuyninh@gmail.com', '$2y$10$7lI2y8jLaDqe61U89bESDuicMDgmMwHCysMQzOvwybplizOhjrgvy', 'admin_1641803603.jpg', 0, '0128397127', 0),
(7, 'Vũ Thị Nụ', 'vuthinu@gmail.com', '$2y$10$qn6lD.zDA0mbIsnw86bytO31uo/Zhp9rv8DFV0uxNSz3ND4MZwAHC', 'admin_1641803711.jpg', 0, '0274891212', 0),
(8, 'Trần Huy Nam', 'tranhuynam@gmail.com', '$2y$10$5q3gomhwKkUt52TY6wUPDOcZuV0Z8AsplW2.kF9uwllN9v4erEqC2', 'admin_1641805085.jpg', 1, '0758637213', 0),
(9, 'Phạm Văn Phú', 'phamvanphu@gmail.com', '$2y$10$MjXaLFomgidam78VoZ8bludBg/k0Z3TAhtAyW725PzOXCDHn1el4m', 'admin_1641805558.jpg', 1, '0224124241', 0),
(10, 'Mai Tiến Đạt', 'maitiendat@gmail.com', '$2y$10$ShSOIJNB8imOUCn5Ve1Th.s8kDxo0qtpU6NlDkQa4w9tJs4ttJC6S', 'admin_1641805602.jpg', 1, '0899472141', 0),
(11, 'Đỗ Phi Long', 'dophilong@gmail.com', '$2y$10$1pX1CnI7nSTRjJRltdf58OOhZDilurbMUXnUOnJtl.oGaw5i6aiRq', 'admin_1641805893.jpg', 1, '0909783211', 0),
(12, 'Lê Thị Hồng Ngần', 'lethihongan@gmail.com', '$2y$10$RN9G8MxkETUaoQinD9M6C.C1hVLidd8g2colx54Bq1nT7oH9lJqkC', 'admin_1641805940.jpg', 0, '0785894032', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`) VALUES
(2, 'Nhạc Việt', 'category_1640529639.jpg'),
(3, 'Nhạc Âu Mỹ', 'category_1640623549.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `playlists`
--

CREATE TABLE `playlists` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `playlists`
--

INSERT INTO `playlists` (`id`, `name`, `image`) VALUES
(1, 'Nhạc Trẻ Gây Nghiện', 'playlist_1641117830.jpg'),
(2, '100% Gây Nghiện', 'playlist_1641197875.jpg'),
(3, 'V-Poem', 'playlist_1642050133.jpg'),
(4, 'Heartbreak Pop', 'playlist_1642147321.jpg'),
(5, 'Be Happy, It\'s Spring', 'playlist_1642309960.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `playlist_song`
--

CREATE TABLE `playlist_song` (
  `playlist_id` int(11) NOT NULL,
  `song_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `playlist_song`
--

INSERT INTO `playlist_song` (`playlist_id`, `song_id`, `created_at`) VALUES
(1, 6, '2022-01-16 05:49:21'),
(2, 1, '2022-01-03 08:54:10'),
(2, 2, '2022-01-12 16:22:17'),
(2, 4, '2022-01-16 05:57:58'),
(2, 7, '2022-01-16 05:56:47'),
(2, 9, '2022-01-17 16:40:16'),
(3, 3, '2022-01-13 05:02:22'),
(4, 4, '2022-01-14 08:07:55'),
(4, 5, '2022-01-14 08:07:47'),
(4, 7, '2022-01-16 05:49:13'),
(4, 9, '2022-01-17 16:40:15'),
(5, 8, '2022-01-16 05:49:35');

-- --------------------------------------------------------

--
-- Table structure for table `saved_songs`
--

CREATE TABLE `saved_songs` (
  `user_id` int(11) NOT NULL,
  `song_id` int(11) NOT NULL,
  `saved_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `saved_songs`
--

INSERT INTO `saved_songs` (`user_id`, `song_id`, `saved_at`) VALUES
(3, 1, '2022-01-14 14:33:14'),
(3, 2, '2022-01-14 14:32:05'),
(3, 3, '2022-01-16 14:38:40');

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `audio` varchar(255) NOT NULL,
  `lyric` text NOT NULL,
  `vocalist` varchar(200) NOT NULL,
  `category_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`id`, `name`, `image`, `audio`, `lyric`, `vocalist`, `category_id`, `admin_id`, `created_at`) VALUES
(1, 'Past Lives', 'admin_1641111650.jpg', 'song_1641111650.mp3', 'Past lives couldn\'t ever hold me down\r\nLost love is sweeter when it\'s finally found\r\nI\'ve got the strangest feeling\r\nThis isn\'t our first time around\r\nPast lives couldn\'t ever come between us\r\nSome time the dreamers finally wake up\r\nDon\'t wake me I\'m not dreaming\r\nDon\'t wake me I\'m not dreaming', 'SapientDream', 3, 1, '2022-01-02 08:20:50'),
(2, 'Natural', 'song_1641976251.jpg', 'song_1641976251.mp3', 'Will you hold the line?\r\nWhen every one of them has given up and given in, tell me\r\nIn this house of mine\r\nNothing ever comes without a consequence or cost, tell me\r\nWill the stars align?\r\nWill heaven step in will it save us from our sin, will it?\r\n\'Cause this house of mine stands strong\r\nThat\'s the price you pay\r\nLeave behind your heart and cast away\r\nJust another product of today\r\nRather be the hunter than the prey\r\nAnd you\'re standing on the edge face up\r\n\'Cause you\'re a natural\r\nA beating heart of stone\r\nYou gotta be so cold\r\nTo make it in this world\r\nYeah, you\'re a natural\r\nLiving your life cutthroat\r\nYou gotta be so cold\r\nYeah, you\'re a natural\r\nWill somebody\r\nLet me see the light within the dark trees shadowing\r\nWhat\'s happening?\r\nLooking through the glass find the wrong within the past knowing\r\nOh, we are the youth\r\nCut until it bleeds inside a world without the peace, face it\r\nA bit of the truth, the truth\r\nThat\'s the price you pay\r\nLeave behind your heart and cast away\r\nJust another product of today\r\nRather be the hunter than the prey\r\nAnd you\'re standing on the edge face up\r\n\'Cause you\'re a natural\r\nA beating heart of stone\r\nYou gotta be so cold\r\nTo make it in this world\r\nYeah, you\'re a natural\r\nLiving your life cutthroat\r\nYou gotta be so cold\r\nYeah, you\'re a natural\r\nDeep inside me\r\nI\'m fading to black I\'m fading\r\nTook an oath by the blood on my hand won\'t break it\r\nI can taste it the end is upon us I swear\r\nGonna make it\r\nI\'m gonna make it\r\nNatural\r\nA beating heart of stone\r\nYou gotta be so cold\r\nTo make it in this world\r\nYeah, you\'re a natural\r\nLiving your life cutthroat\r\nYou gotta be so cold\r\nYeah, you\'re a natural\r\nNatural\r\nYeah, you\'re a natural', 'Imagine Dragons', 3, 1, '2022-01-12 08:30:51'),
(3, 'nằm ngủ emru', 'song_1642005130.jpg', 'song_1642005130.mp3', 'Đừng che giấu em nhé\r\nNếu anh đang buồn\r\nNgười an vui thường chẳng\r\nThức đêm thức hôm\r\nMệt chuyện công việc anh muốn kể\r\nThì anh cứ kể em nghe\r\nĐừng chỉ biết cố gắng mãi trong im lặng\r\nVài hôm anh mệt quá\r\nỐm đi em chăm\r\nMột khi trong đời anh thấy đủ\r\nThì ta thấy đủ thôi anh\r\nNằm bên cạnh em nhắm mắt lại\r\nĐừng thao thức chong chong đêm dài\r\nQuên tạm đi trái ngang\r\nQuên lòng người dối gian\r\nQuên được và mất mát\r\nNgủ đi ngủ ngon nhé anh yêu\r\nThả trôi hết đi biết bao điều\r\nTrôi vào trong giấc mơ\r\nMơ mọc đôi cánh bay\r\nNgả lưng trên đám mây\r\nĐừng che giấu em nhé\r\nNếu anh đang buồn\r\nNgười an vui thường chẳng\r\nThức đêm thức hôm\r\nMệt chuyện công việc anh muốn kể\r\nThì anh cứ kể em nghe\r\nĐừng chỉ biết cố gắng mãi trong im lặng\r\nVài hôm anh mệt quá\r\nỐm đi em chăm\r\nMột khi trong đời anh thấy đủ\r\nThì ta thấy đủ thôi anh\r\nỞ trên này anh thấy những gì\r\nĐừng chỉ nói xung quanh mây bay\r\nKhi mà anh bé thơ\r\nVô tình anh ngước lên\r\nSẽ nhìn ra thứ khác\r\nNhìn ra hình con cá con thuyền\r\nNhìn ra biết bao thứ luyên thuyên\r\nNhưng vì sao lớn hơn\r\nTa tưởng tượng ít hơn\r\nVà lại vui ít hơn\r\nĐừng chỉ biết cố gắng mãi trong im lặng\r\nVài hôm anh mệt quá\r\nỐm đi em chăm\r\nMột khi trong đời anh thấy đủ\r\nThì ta thấy đủ thôi anh', 'Bích Phương', 2, 1, '2022-01-12 16:32:10'),
(4, 'Dancing with your ghost', 'song_1642147525.jpg', 'song_1642147525.mp3', 'Yelling at the sky\r\nScreaming at the world\r\nBaby, why\'d you go away?\r\nI\'m still your girl\r\nHolding on too tight\r\nHead up in the clouds\r\nHeaven only knows\r\nWhere you are now\r\nHow do I love\r\nHow do I love again?\r\nHow do I trust\r\nHow do I trust again?\r\nI stay up all night\r\nTell myself I\'m alright\r\nBaby, you\'re just harder to see than most\r\nI put the record on\r\nWait \'til I hear our song\r\nEvery night I\'m dancing with your ghost\r\nEvery night I\'m dancing with your ghost\r\nNever got the chance\r\nTo say a last goodbye\r\nI gotta move on\r\nBut it hurts to try\r\nHow do I love\r\nHow do I love again?\r\nHow do I trust\r\nHow do I trust again?\r\nI stay up all night\r\nTell myself I\'m alright\r\nBaby, you\'re just harder to see than most\r\nI put the record on\r\nWait \'til I hear our song\r\nEvery night I\'m dancing with your ghost\r\nEvery night I\'m dancing with your ghost\r\nHow do I love\r\nHow do I love again?\r\nHow do I trust\r\nHow do I trust again?\r\nI stay up all night\r\nTell myself I\'m alright\r\nBaby, you\'re just harder to see than most\r\nI put the record on\r\nWait \'til I hear our song\r\nEvery night I\'m dancing with your ghost\r\nEvery night I\'m dancing with your ghost\r\nEvery night I\'m dancing with your ghost', 'Sasha Alex Sloan', 3, 1, '2022-01-14 08:05:25'),
(5, 'Heartbreak Anniversary', 'song_1642147656.jpg', 'song_1642147656.mp3', 'Ooh\r\n\r\nBalloons are deflated\r\nGuess they look lifeless like me\r\nWe miss you on your side of the bed, mmm\r\nStill got your things here\r\nAnd they stare at me like souvenirs\r\nDon\'t wanna let you out my head\r\n\r\nJust like the day that I met you\r\nThe day I thought forever\r\nSaid that you love me\r\nBut that\'ll last for never\r\nIt\'s cold outside\r\nLike when you walked out my life\r\nWhy you walk out my life?\r\n\r\nI get like this every time\r\nOn these days that feel like you and me\r\nHeartbreak anniversary\r\n\'Cause I remember every time\r\nOn these days that feel like you and me\r\nHeartbreak anniversary\r\nDo you ever think of me?\r\n\r\nno\r\n(Ooh) no-no, no\r\n(Ooh, ooh, ooh) ooh, nah\r\n\r\nI\'m buildin\' my hopes up\r\nLike presents unopened \'til this day\r\nI still see the messages you read, mmm\r\nI\'m foolishly patient\r\n(Foolishly patient)\r\nCan\'t get past the taste of your lips\r\n(Taste of your lips)\r\nDon\'t wanna let you out my head\r\n\r\nJust like the day that I met you\r\nThe day I thought forever\r\nSaid that you love me\r\nBut that\'ll last for never\r\nIt\'s cold outside\r\nLike when you walked out my life\r\nWhy you walk out my life? (My life)\r\n\r\nI get like this every time\r\nOn these days that feel like you and me\r\nHeartbreak anniversary\r\n\'Cause I remember every time\r\nOn these days that feel like you and me\r\nHeartbreak anniversary\r\nDo you ever think of me?', 'Giveon', 3, 1, '2022-01-14 08:07:36'),
(6, 'Ái Nộ', 'song_1642311744.jpg', 'song_1642311744.mp3', 'Người đi xa có nhớ chăng?\r\nDòng thư tay lời hỏi thăm\r\nVài câu ca dưới ánh trăng mờ\r\nHôm đó có ai đang trở về\r\nLệ dần phai theo tháng năm\r\nLời biệt ly sao khó khăn\r\nVùi đầu trong chăn gối\r\nMong được nói hết tâm tư này\r\nĐừng dối em ơi\r\nĐừng lừa em ơi\r\nĐừng vờn con tim anh như trò đùa\r\nĐừng hứa đôi ba lời cuội nhăng nha đừng để\r\nÀ í a í a\r\nĐừng dối em ơi, toàn là văn thôi\r\n1 lần đau thôi anh đủ mệt rồi\r\nĐừng hứa thêm chi lệ dài trên mi\r\nĐừng để anh hoá ma lai\r\nKhói sương thật mơ màng\r\nChết trong sự ngỡ ngàng\r\nĐôi ba lời câu hình thức ta ngân nga để lại cho nàng\r\nRồi giờ này nàng cùng với ai?\r\nChẳng còn ngày nào mặn nồng với ta\r\nĐời sang trang linh hồn lang thang\r\nPhận này ngang ngang một mình lướt trên con đò\r\nTình tình tang tang giai điệu ngân vang\r\nTừ biệt nhân gian à ý aa\r\nNgười đi xa có nhớ chăng?\r\nDòng thư tay lời hỏi thăm\r\nVài câu ca dưới ánh trăng mờ\r\nHôm đó có ai đang trở về\r\nLệ dần phai theo tháng năm\r\nLời biệt ly sao khó khăn\r\nVùi đầu trong chăn gối mong được nói hết tâm tư này\r\nĐừng dối em ơi\r\nĐừng lừa em ơi\r\nĐừng vờn con tim anh như trò đùa\r\nĐừng hứa đôi ba lời cuội nhăng nha đừng để\r\nA í a í a\r\nĐừng dối em ơi, toàn là văn thôi\r\nMột lần đau thôi anh đủ mệt rồi\r\nĐừng hứa thêm chi lệ dài trên mi\r\nĐừng để anh hoá ma lai\r\nPhận duyên be bé, cơi trầu buồng cau\r\nHẹn thề bên nhau đến khi bạc đầu', 'Masew x Khoi Vu', 2, 1, '2022-01-16 05:42:24'),
(7, 'Attention', 'song_1642311993.png', 'song_1642311993.mp3', 'Oh-oh, ooh\r\nYou\'ve been runnin\' round, runnin\' round, runnin\' round throwin\' that dirt all on my name\r\n\'Cause you knew that I, knew that I, knew that I\'d call you up\r\nYou\'ve been going round, going round, going round every party in L.A.\r\n\'Cause you knew that I, knew that I, knew that I\'d be at one, oh\r\nI know that dress is karma, perfume regret\r\nYou got me thinking \'bout when you were mine, oh\r\nAnd now I\'m all up on ya, what you expect?\r\nBut you\'re not coming home with me tonight\r\nYou just want attention, you don\'t want my heart\r\nMaybe you just hate the thought of me with someone new\r\nYeah, you just want attention, I knew from the start\r\nYou\'re just making sure I\'m never gettin\' over you\r\nyou\'ve been runnin\' round, runnin\' round, runnin\' round throwing that dirt all on my name\r\n\'Cause you knew that I, knew that I, knew that I\'d call you up\r\nBaby, now that we\'re, now that we\'re, now that we\'re right here standing face-to-face\r\nYou already know, already know, already know that you won, oh\r\nI know that dress is karma (dress is karma), perfume regret\r\nYou got me thinking \'bout when you were mine (you got me thinking \'bout when you were mine)\r\nAnd now I\'m all up on ya (all up on ya), what you expect? (oh baby)\r\nBut you\'re not coming home with me tonight (oh no)\r\nYou just want attention, you don\'t want my heart\r\nMaybe you just hate the thought of me with someone new\r\nYeah, you just want attention, I knew from the start\r\nYou\'re just making sure I\'m never gettin\' over you, oh\r\nWhat are you doin\' to me, what are you doin\', huh?\r\n(What are you doin\'?)\r\nWhat are you doin\' to me, what are you doin\', huh?\r\n(What are you doin\'?)\r\nWhat are you doin\' to me, what are you doin\', huh?\r\n(What are you doin\'?)\r\nWhat are you doin\' to me, what are you doin\', huh?\r\nI know that dress is karma, perfume regret\r\nYou got me thinking \'bout when you were mine\r\nAnd now I\'m all up on ya, what you expect?\r\nBut you\'re not coming home with me tonight\r\nYou just want attention, you don\'t want my heart\r\nMaybe you just hate the thought of me with someone new\r\nYeah, you just want attention, I knew from the start\r\nYou\'re just making sure I\'m never gettin\' over you (over you)\r\nWhat are you doin\' to me? (hey) what are you doin\', huh? (what are you doin\', what?)\r\n(What are you doin\', to me? What are you doin\', huh?)\r\n(What are you doin\', to me? What are you doin\', huh?)\r\n(What are you doin\' to me, what are you doin\', huh?)', 'Charlie Puth', 3, 1, '2022-01-16 05:46:33'),
(8, 'Happy', 'song_1642312125.jpg', 'song_1642312125.mp3', 'It might seem crazy what I am \'bout to say\r\nSunshine she\'s here, you can take a break\r\nI\'m a hot air balloon that could go to space\r\nWith the air, like I don\'t care, baby by the way\r\nHuh (Because I\'m happy)\r\nClap along if you feel like a room without a roof\r\n(Because I\'m happy)\r\nClap along if you feel like happiness is the truth\r\n(Because I\'m happy)\r\nClap along if you know what happiness is to you\r\n(Because I\'m happy)\r\nClap along if you feel like that\'s what you wanna do\r\nHere come bad news talking this and that (Yeah)\r\nWell give me all you got, don\'t hold back (Yeah)\r\nWell I should probably warn you I\'ll be just fine (Yeah)\r\nNo offence to you don\'t waste your time\r\nHere\'s why\r\nClap along if you feel like a room without a roof\r\n(Because I\'m happy)\r\nClap along if you feel like happiness is the truth\r\n(Because I\'m happy)\r\nClap along if you know what happiness is to you\r\n(Because I\'m happy)\r\nClap along if you feel like that\'s what you wanna do\r\nUh, bring me down\r\nCan\'t nothing, bring me down\r\nMy level\'s too high to bring me down\r\nCan\'t nothing, bring me down, I said\r\nBring me down, can\'t nothing\r\nBring me down\r\nMy level\'s too high to bring me down\r\nCan\'t nothing, bring me down, I said\r\nClap along if you feel like a room without a roof\r\n(Because I\'m happy)\r\nClap along if you feel like happiness is the truth\r\n(Because I\'m happy)\r\nClap along if you know what happiness is to you\r\n(Because I\'m happy)\r\nClap along if you feel like that\'s what you wanna do\r\nClap along if you feel like a room without a roof\r\n(Because I\'m happy)\r\nClap along if you feel like happiness is the truth\r\n(Because I\'m happy)\r\nClap along if you know what happiness is to you\r\n(Because I\'m happy)\r\nClap along if you feel like that\'s what you wanna do\r\nUh, bring me down (Happy, happy, happy, happy)\r\nCan\'t nothing (Happy, happy, happy, happy)\r\nBring me down, my level\'s too high\r\nTo bring me down (Happy, happy, happy, happy)\r\nCan\'t nothing (Happy, happy, happy, happy)\r\nBring me down, I said\r\nClap along if you feel like a room without a roof\r\n(Because I\'m happy)\r\nClap along if you feel like happiness is the truth\r\n(Because I\'m happy)\r\nClap along if you know what happiness is to you (ayy, ayy, ayy)\r\n(Because I\'m happy)\r\nClap along if you feel like that\'s what you wanna do\r\nClap along if you feel like a room without a roof\r\n(Because I\'m happy)\r\nClap along if you feel like happiness is the truth\r\n(Because I\'m happy)\r\nClap along if you know what happiness is to you (hey)\r\n(Because I\'m happy)\r\nClap along if you feel like that\'s what you wanna do\r\nCome on', 'Pharrell Williams', 3, 1, '2022-01-16 05:48:45'),
(9, 'lovely', 'song_1642437591.jpg', 'song_1642437591.mp3', 'Thought I found a way\r\nThought I found a way out (found)\r\nBut you never go away (never go away)\r\nSo I guess I gotta stay now\r\nOh, I hope some day I\'ll make it out of here\r\nEven if it takes all night or a hundred years\r\nNeed a place to hide, but I can\'t find one near\r\nWanna feel alive, outside I can\'t fight my fear\r\nIsn\'t it lovely, all alone\r\nHeart made of glass, my mind of stone\r\nTear me to pieces, skin to bone\r\nHello, welcome home\r\nWalkin\' out of town\r\nLookin\' for a better place (lookin\' for a better place)\r\nSomething\'s on my mind (mind)\r\nAlways in my head space\r\nBut I know some day I\'ll make it out of here\r\nEven if it takes all night or a hundred years\r\nNeed a place to hide, but I can\'t find one near\r\nWanna feel alive, outside I can\'t fight my fear\r\nIsn\'t it lovely, all alone\r\nHeart made of glass, my mind of stone\r\nTear me to pieces, skin to bone\r\nHello, welcome home\r\nWhoa, yeah\r\nYeah, ah\r\nWhoa, whoa\r\nHello, welcome home', 'Billie Eilish, Khalid', 3, 1, '2022-01-17 16:39:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `token_verification` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `image`, `email`, `password`, `token`, `status`, `token_verification`) VALUES
(3, 'Nguyễn Mạnh', 'user_1641313634.jpg', 'nvmanh25101@gmail.com', '$2y$10$lMUBwClnPWiGVG2qpy3ule/fMdwky8LurO3eXbRIn.vv38WHqZm0e', NULL, 1, '61d47562b77791641313634');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `playlist_song`
--
ALTER TABLE `playlist_song`
  ADD PRIMARY KEY (`playlist_id`,`song_id`),
  ADD KEY `song_id` (`song_id`);

--
-- Indexes for table `saved_songs`
--
ALTER TABLE `saved_songs`
  ADD PRIMARY KEY (`song_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `playlists`
--
ALTER TABLE `playlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `playlist_song`
--
ALTER TABLE `playlist_song`
  ADD CONSTRAINT `playlist_song_ibfk_1` FOREIGN KEY (`playlist_id`) REFERENCES `playlists` (`id`),
  ADD CONSTRAINT `playlist_song_ibfk_2` FOREIGN KEY (`song_id`) REFERENCES `songs` (`id`);

--
-- Constraints for table `saved_songs`
--
ALTER TABLE `saved_songs`
  ADD CONSTRAINT `saved_songs_ibfk_1` FOREIGN KEY (`song_id`) REFERENCES `songs` (`id`),
  ADD CONSTRAINT `saved_songs_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `songs`
--
ALTER TABLE `songs`
  ADD CONSTRAINT `songs_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`),
  ADD CONSTRAINT `songs_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
