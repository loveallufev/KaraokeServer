-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 03, 2014 at 05:42 PM
-- Server version: 5.5.33
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `karaoke`
--

-- --------------------------------------------------------

--
-- Table structure for table `authentication`
--

CREATE TABLE IF NOT EXISTS `authentication` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `token` varchar(255) NOT NULL COMMENT 'Token when login',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Login time',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=235 ;

--
-- Dumping data for table `authentication`
--

INSERT INTO `authentication` (`id`, `username`, `token`, `time`) VALUES
(1, 'ndtrung', '$2a$08$1OcmJcOmHCkWY8VUP1I9jeK3Ts91kIQanPlenBU3YUxfOUM7Rz1O2', '2013-12-12 17:07:43'),
(2, 'ndtrung', '$2a$08$A8.eolMItUKIUv9QBg75T.g0iCFq1gdgTNSY/iNKoxufKpC92T186', '2013-12-12 17:08:09'),
(3, 'ndtrung', '$2a$08$T9VnUT/Yg1ALH2sQyzgnuusW54GcVcbwZi/rfqjb4RkPdGTGhRIXa', '2013-12-12 19:16:39'),
(4, 'ndtrung', '$2a$08$B2mw/w/53qpvRpiRVck2Xuaw96tS2VIIr.peSqd6x1DysTnVmd3a2', '2013-12-12 19:42:44'),
(5, 'mimi', '$2a$08$Ch2Hl62XFw9D2W5o3NYMfuxvDsJVyo7a/h2XAH2PNCIL2EJclSYHe', '2013-12-13 17:07:02'),
(6, 'lala', '$2a$08$.wyWq9OKSwoHVl/3iQL0H.Ch3WbUBuDMT96.uJmqNw0G4Cbzt3zCC', '2013-12-13 17:41:44'),
(7, 'phuoc', '$2a$08$S0mMRDYGYMYeICCGe8UQ6O5mxjnT929zx1IjwJT0DeTiHuTlzkQcm', '2013-12-13 18:22:24'),
(8, 'ndtrung', '$2a$08$xC4htAQxGonjg4wxgNNMNOOmvs2kmu1tv.Vd5Y4seDJXHOyvjQb82', '2013-12-13 18:42:43'),
(9, 'ndtrung', '$2a$08$406Mpfe6rRNZaDTTHECbRuJj/sL24wQo3PwxUau/ZeVRwcfsOpcka', '2013-12-13 18:49:00'),
(10, 'ndtrung', '$2a$08$yolo2bj.61dHsamuvOsF3e4ndG4i76vQ3r943rJ1uBaG9q6Tst2VO', '2013-12-13 18:59:35'),
(11, 'ndtrung', '$2a$08$pHvrt1xWaXlhPQbV9EBQteIQPFbuRu9HwKebprViL9HWFxpP7iKwW', '2013-12-13 19:07:07'),
(12, 'ndtrung', '$2a$08$cTfr/PeW6mDMrlBj4OW40eompSyXi1xdv9ifFAWMBb/jRkb4frDCm', '2013-12-13 19:12:10'),
(13, 'ndtrung', '$2a$08$n1Jwl6BTxB.qPBB.qxolkOYItoALDW1IrhfWBb/JpUUUcr9YJcB7u', '2013-12-13 19:22:27'),
(14, 'ndtrung', '$2a$08$5JuHzu48dz3r5b2qlFu.fOug7J/FLalu8vjAJwaRrvK0WmOs3zeom', '2013-12-13 20:20:49'),
(15, 'ndtrung', '$2a$08$qJvRXlNhGNtHWKhjDfqYTOEgEegWg46.DmgOCr9.WCrIPVG4Mwc1u', '2013-12-13 20:21:59'),
(16, 'ndtrung', '$2a$08$uEfaNBvM63BKUAO1o1xpOuxQzXsh/kcxufPSULOHJhhwZZSaWc51a', '2013-12-13 20:24:04'),
(17, 'ndtrung', '$2a$08$Sueop7BhGAltjSIH5A9SkuzABXarPnCmSf5dg7SVzdOR2Z9HaGWaW', '2013-12-13 20:27:45'),
(18, 'ndtrung', '$2a$08$yO0abslDvY5yDpxrIXZtJuTFPYcJIiUvHN29ohzRIh0f6UDwbGc5q', '2013-12-13 20:31:01'),
(19, 'ndtrung', '$2a$08$02.WmQcgwvkhT8.xlpBQre0oRbYOHX6o28N4b74ZcZsDxGRVKPD8C', '2013-12-13 20:39:51'),
(20, 'ndtrung', '$2a$08$CFfE64sZNqqNyXoIHVcta.5rq9SIfPaYkkrsRZKNenwMrRf/VH9LO', '2013-12-13 20:48:41'),
(21, 'ndtrung', '$2a$08$mneeSdiVLD.XEuY09oDTkOPxlriGev/OSOYIgEIY8jNSjAE1hWX9S', '2013-12-13 20:51:43'),
(22, 'ndtrung', '$2a$08$7obemeOAWJ06kTe2K0iOAeUzOTjvhqupVrcWJg0Li9sC9nP2gWYQK', '2013-12-13 20:54:31'),
(23, 'ndtrung', '$2a$08$90fTyGMrJ94moe04/QUlyea0hppZCwVkg8.ShAXXapNGcSlECxGpW', '2013-12-13 20:56:39'),
(24, 'ndtrung', '$2a$08$1GrK765WeqP3ub8Mg5Wqx.mbSvhDdl4EDE1fX/ZtpGO5dd/iSHUg2', '2013-12-13 21:03:05'),
(25, 'ndtrung', '$2a$08$qlmfvP7.TUD6iDBuYS9n2OjWM1jAwyTtNXLF1XEe8iRoudC5utGu2', '2013-12-13 21:05:28'),
(26, 'ndtrung', '$2a$08$XjrrJLvoe/C5BOyqJBIVLe3Q6YrFK4FwL8LAgLWvP7H8rKU7mNwJC', '2013-12-13 21:18:34'),
(27, 'ndtrung', '$2a$08$nNlOiAm4m9XvECU2zGnUlOV4Rn2/3MOo6J4YYPpU.Z4fpcuAPMH52', '2013-12-13 21:20:05'),
(28, 'ndtrung', '$2a$08$o4msZ/rQmHewic8XH/VdSOvVJWhUdEDFpMuRXq9LFnNeca/RrdA6S', '2013-12-13 21:22:52'),
(29, 'ndtrung', '$2a$08$MSgQuaHKAZu.9zXr7Sr2C.HANheVnulX17RRwSVFqwqlnD.4LPFiy', '2013-12-13 21:24:39'),
(30, 'ndtrung', '$2a$08$F3dy1xQB1RHB82xONEXY3uHXfMQEoxUNnsH0sxdSh/7/n5vmTEPlC', '2013-12-13 21:36:16'),
(31, 'ndtrung', '$2a$08$SaTJDGDbVaQTG3in0gZl3e5uitJJClPEm7LYQxaJOUKQsUdfwMsOm', '2013-12-13 21:42:35'),
(32, 'ndtrung', '$2a$08$c2n1TZcSLfVfUYGS5gyg9OKkGEvHMjNGhJK6pMVcxgUPaB2hgKWlK', '2013-12-13 21:44:52'),
(33, 'ndtrung', '$2a$08$6suPAffV7hKrRYz0176aMuMNy.VAWMXLNex1q8/.QYBnOf7XKEsE.', '2013-12-13 21:48:20'),
(34, 'ndtrung', '$2a$08$h5vHX2ziRUsFvlJ1vshzguyBcu37dcQDVqOMHQcrBH09oQeqSkvcO', '2013-12-13 21:51:10'),
(35, 'ndtrung', '$2a$08$ejBgKd28ArRRV.K3TK.S7uYExoZT0NdkgPM..9x8qMaDgvjeViF.K', '2013-12-13 22:00:00'),
(36, 'ndtrung', '$2a$08$5eVwWUXqZsPumMhkCmUYYuiMjxdG.P2FrjycE5CXFYZi.2UgApiPi', '2013-12-13 22:04:43'),
(37, 'ndtrung', '$2a$08$NKzvULBKX8.M/dObvTvYeuxe6dRMfE594D3ySm5xSgZrgJCksf76.', '2013-12-13 22:12:53'),
(38, 'ndtrung', '$2a$08$Gqp5F1VEMzFWrO0iwdkQHunFxxAXH8myfNNtRXET3wjI6B2wDw6gS', '2013-12-13 22:25:33'),
(39, 'ndtrung', '$2a$08$9VQcKzWRbLvhYT1TP5uLUOchUkUPPOU.AnVIQHSYkZ3JchLtzIQNS', '2013-12-13 22:27:37'),
(40, 'ndtrung', '$2a$08$MoVxli6tMb7KaHOeSgtfO.JQK8uLqfiThByGTyAREnazS/ScjVP2i', '2013-12-13 22:31:34'),
(41, 'ndtrung', '$2a$08$Hjo/1LZDWRziCRuvZYREyOH8OWW1QXZcy4sGLG1Wg7HHY7tdcTNbO', '2013-12-13 22:32:57'),
(42, 'ndtrung', '$2a$08$J3beoJn4qxHfKLzBSnnfp.cEJVYQpFjSiL3b1Zvjk4Q/DDd.CaEiK', '2013-12-13 22:51:25'),
(43, 'ndtrung', '$2a$08$mzl4.V37p2WZqIbvg4NBRu3nu50oWMmi8ybk1FQc3VIhRW38s0Dcq', '2013-12-13 23:57:54'),
(44, 'ndtrung', '$2a$08$wncb9FVqmPNN7WRMOeb93Oai5DKQiOnY3AktNHQ9IkaYvpDZNELdy', '2013-12-14 00:10:08'),
(45, 'ndtrung', '$2a$08$YSJPQ./9RStcx.BBIu.zB.ob3w4B8ZQteDvii7w23O0sNpbVVlRQq', '2013-12-14 00:27:37'),
(46, 'ndtrung', '$2a$08$RF8BahGMAl/03zY6grMN3O1kpMVs/z5V3iq55G41XUiD73W3IeAQ2', '2013-12-14 00:35:20'),
(47, 'ndtrung', '$2a$08$4fsXU31AYmAn31dU/6DXIu9z6ODsBu1dYsG2fz3iUuxK2o9/vmh2q', '2013-12-14 00:41:01'),
(48, 'ndtrung', '$2a$08$TsVN0sivoeY/hJzHzzmgu.8C0g0QW.WHFq7Ae9QKl5kl/g7a51oey', '2013-12-14 01:01:29'),
(49, 'ndtrung', '$2a$08$xTL8YiMAMGgGtb6wJgtwZ.Mal3clBV2OTf0Kx94XVqifL6cYHkeFi', '2013-12-14 01:06:06'),
(50, 'ndtrung', '$2a$08$X/uhCAiRexHuMWQVzm5bX.O6jrfckQ/GFcKVWZOjF69j.hsyuBpb2', '2013-12-14 01:11:32'),
(51, 'ndtrung', '$2a$08$8X/4fv9H0.SlRJnHYzIki.Q9J18dupEokJYO5q6LvZi2C/FHwtDqC', '2013-12-14 01:15:35'),
(52, 'ndtrung', '$2a$08$iW7w7L3Yd/qIQHVPKiOQT.Gi4mN1RrdwjZP/NkxghWGMFVp5c7bJS', '2013-12-14 01:24:57'),
(53, 'ndtrung', '$2a$08$7gbqGgkmgS8XrbhwgQRt6OV4IVDOpRIuD/pqVeb936tQ/bf7ayz5y', '2013-12-14 01:26:27'),
(54, 'ndtrung', '$2a$08$DJilFZz3HUq7AhB7CtoVYuT4Sb4xp1i1Q4F.UjNYp4N.mPxpJ4ble', '2013-12-14 01:30:09'),
(55, 'ndtrung', '$2a$08$fdst/dp1zNqWNt6z3GHJMe9T92/q6O/SyZfwyismkx.mjlT0lYQa6', '2013-12-14 01:36:00'),
(56, 'ndtrung', '$2a$08$m8fBQ9J/p.gz9BhrUITAB.D01rbX7fp.Csi4zzVn7h0EBN.Pkev5q', '2013-12-14 01:43:28'),
(57, 'ndtrung', '$2a$08$Xq.OMBgoIOef4DlJPXb55.V0fwFd8sjx33LFDPI4eBQFisOdXLr5O', '2013-12-14 01:50:39'),
(58, 'ndtrung', '$2a$08$AvD4paIaJpGI.fC7arZOUO/jAQEHDfTRVwxnXcJL/8lYnfkXVGqCe', '2013-12-14 02:02:15'),
(59, 'ndtrung', '$2a$08$HPWJTkX3rn5PgeIxcnFQV.8InU.53vzJ0ZWBAkOVjm911Aa5nxe5e', '2013-12-14 03:56:10'),
(60, 'ndtrung', '$2a$08$4QPKdC53u.GTFfqcJgrMNO4tK.GXDmXQhdZeb2U3xKcEaPoNNqClu', '2013-12-14 04:05:28'),
(61, 'ndtrung', '$2a$08$ZJwnRdAyP/ofTNLvAdJvg.Mt0aJLt1zsZyEr5W5sz8DIH.64NJSVO', '2013-12-14 04:11:18'),
(62, 'ndtrung', '$2a$08$5jH42YoumDV22yYdJyr3wunlM3Btb1dWXziIVq4FAsRBOIxQOpdES', '2013-12-14 04:13:06'),
(63, 'ndtrung', '$2a$08$tpEq.5PCFUQDIOBIFHK2I.lEyj.bINqEO3p5CiBAfsa3UCNlwtCme', '2013-12-14 12:51:49'),
(64, 'ndtrung', '$2a$08$Y49cXFqFiNHBsR9Txz3Jwe5NcoU8QxVC0v79V1meUQATMgzNmo85S', '2013-12-14 12:54:40'),
(65, 'ndtrung', '$2a$08$WPb5zfVxFEvK9a.C0KHnmuhZAdCH2lbMowbHEnTiOrnUgj3K1R14K', '2013-12-14 13:57:15'),
(66, 'ndtrung', '$2a$08$U28lLoSyTtbk2zZNpZbzuOgtDLLGS4Gh90A71ksLQcruL9hlaTR/q', '2013-12-14 14:02:26'),
(67, 'ndtrung', '$2a$08$lgEJ2sL5YMPG/s6FYYUGFu4mrMpgiBMzX/bgaH.xrTWP95woe3h9W', '2013-12-14 14:06:03'),
(68, 'ndtrung', '$2a$08$2heCdwqvy3Bc8P9XGaFTi.FiCVvdOD4DeWd.6FHb6IKQzRZ6wY3aK', '2013-12-14 14:27:56'),
(69, 'ndtrung', '$2a$08$ecqWruN33ArjStEvVJ99l.Ak4COlFEWPG1QcwDgRrFHoFqFwBYhJ2', '2013-12-14 14:34:12'),
(70, 'ndtrung', '$2a$08$2PAIH1E/dyyXrjXMQFvWqunmabjUaQD9dt2ZmIUmW9vPjWu7yw6m2', '2013-12-14 14:44:05'),
(71, 'ndtrung', '$2a$08$wCL8iN.493FsJqpYMPi9A.zEYpRX7bB7nTtJ7f6lj2XkAw.4zAide', '2013-12-14 14:51:56'),
(72, 'ndtrung', '$2a$08$LxtazWxUXUnn3mdBxGQD/OC6Jbc15Y.LBufAnhrWONxML1lVA28tu', '2013-12-14 14:58:27'),
(73, 'ndtrung', '$2a$08$QhHfOQk9FQjM9214wOvUiOqnWQOz42F7Owr1/7vbNYyqMXGt8i9kG', '2013-12-14 15:02:08'),
(74, 'ndtrung', '$2a$08$1gO4fF/lCDMH5oz0wHNKhuPwx1P9RYe7r5SK0OvGsOUSj2A.GgY6i', '2013-12-14 15:27:53'),
(75, 'ndtrung', '$2a$08$XXoRgfODq0LzXXyGROppNuwtygPTTHWNd8ruR/Tvvwyb0D.GpGFIC', '2013-12-14 15:44:34'),
(76, 'ndtrung', '$2a$08$rJZz2jlla8NqDyUvJrbR1.dP1YgjIxc4WPbCY00aOobjJAj2YvmFW', '2013-12-14 15:52:02'),
(77, 'ndtrung', '$2a$08$NdziJtTxZ3IL2BtSy8xs.u/Jt8jFrGyAtUYJ79C.D6WbtAqTw5GuS', '2013-12-14 16:14:38'),
(78, 'ndtrung', '$2a$08$85kFAAXYnTitv/WgZhmMw.OUqD95INmmivG.mjwKDXDcuwfvB2VS6', '2013-12-14 16:24:02'),
(79, 'ndtrung', '$2a$08$qNBdJWt6jVOuU4CJFrQUM.DAs4AAEaqC72IXFkMN4PsOwplHw839y', '2013-12-14 16:31:29'),
(80, 'ndtrung', '$2a$08$ys8YOSwBD4bVWqCcMPeI1eN9BhKA07Ui/yfbf9xqPW9eIdjhMOw1y', '2013-12-14 16:48:05'),
(81, 'ndtrung', '$2a$08$mdao8MIpVsFlEubCBKTuaOs/Py0wAbVsJXXZYIM4X6aFnoZJczmE.', '2013-12-14 17:17:43'),
(82, 'ndtrung', '$2a$08$Xkak0.GZTS6NC4lUz14paumuMPWwK5sIqGEB.Erl7TTAo/W7XdReq', '2013-12-14 17:24:51'),
(83, 'ndtrung', '$2a$08$2JKKfsC6o2Yf2cbpC.L.JuLPWUfMyhTHVwPesPqyTcLX1NUbyZy/m', '2013-12-14 17:27:47'),
(84, 'ndtrung', '$2a$08$PNNd1QBy51rwEv1rdIQxQucphfKNeyLVjEzxN9NcuJFfD5DboHc7K', '2013-12-14 17:30:45'),
(85, 'ndtrung', '$2a$08$NPK.wrk3BacieXticdQoTeKzdjpo7w/XeP8hBU0ckgXm4TDl0ivPu', '2013-12-14 17:34:16'),
(86, 'ndtrung', '$2a$08$xWTlcg2cjVvAIUEqfYySruxG5zywpdBAyj8nUL.1BLPv/fo1aK68.', '2013-12-14 17:37:45'),
(87, 'ndtrung', '$2a$08$AbO6SMwTwDLoyI8TtJSfyuyQKsp/8NF/dE7I0NQtXUetNhyjf7FEy', '2013-12-14 17:51:02'),
(88, 'ndtrung', '$2a$08$8dXGMDo7UztFXsKqjJedoeoZrgdLaB3sua6IPmaqnrtiBsi.OBibG', '2013-12-14 17:55:05'),
(89, 'ndtrung', '$2a$08$.XSOcK1.tqiizSs4V7Fxqej99KpJfoDzrBPiQgJERYaennGhXP.ZS', '2013-12-14 18:06:17'),
(90, 'ndtrung', '$2a$08$pztXjgaESAB2xxJQ7D8CH.vkkIiYIsIAiuZmSSZe42SU4.pz2XoW6', '2013-12-14 18:35:38'),
(91, 'ndtrung', '$2a$08$afOG8JEr6t.hdxs4HlTwK./9vFsWH20TlbkU5dr.Uw6ChekTzmX3a', '2013-12-14 18:43:03'),
(92, 'ndtrung', '$2a$08$6TWMUEyrvatGq6O8oRGBVOttjJwAxf7BPxOo45reUc6CB..ldK4xe', '2013-12-14 19:09:23'),
(93, 'ndtrung', '$2a$08$QmaEFgyvYL2SZlNiUXc9yO9qhReY/advLFMVWUkwPqf17VI4H7dyC', '2013-12-14 20:44:02'),
(94, 'ndtrung', '$2a$08$6aM6VNGX0iFhG5CvcWIpGedSkHkiMEdtGmKL2qJUi87Va1/MWNeJy', '2013-12-14 21:22:02'),
(95, 'ndtrung', '$2a$08$T6PurlaUVMp32BniFk9Np.HdyKjvIeF53R1BvXwSyNjrHJ9GfiPbK', '2013-12-14 21:25:43'),
(96, 'ndtrung', '$2a$08$hBVPZ2.5Y.GBu1Ogutel3.LyMMGvWCGJ0T/pJ1D2ZqcexST.0nWD.', '2013-12-14 21:27:23'),
(97, 'ndtrung', '$2a$08$EA9gZao583sfHEwqKuL7Oeracusny4bNQ1IbCNKcXBC.XfuKe//iu', '2013-12-14 21:32:26'),
(98, 'ndtrung', '$2a$08$mztS9XHQ1wFZhyUPOtHGLu1tuM8Fjw11/fWlP7oBXwy4KGdXrtDVG', '2013-12-14 21:36:36'),
(99, 'ndtrung', '$2a$08$BWBM3oYhI.QVbSiYtKvq3uqqHUIbJ6ZRiVq0vHNLi/TKtSJylv.CW', '2013-12-14 21:58:44'),
(100, 'ndtrung', '$2a$08$BpKo70gABum8uXlGQYrqbe9r1TRFpmRzo2R0iIyl2ho.QBQmOHtky', '2013-12-14 22:11:21'),
(101, 'ndtrung', '$2a$08$GvV77QVdQ.aLrRYJCGbPQuMwboPLajPdVLDGhesAbGHDC6HQNhbiu', '2013-12-14 22:56:29'),
(102, 'ndtrung', '$2a$08$jY6s6e0xuCnyJsi2WJ15Ce0VWcBIbELVGCz00OX/610VJvD5QnvbO', '2013-12-14 23:04:28'),
(103, 'ndtrung', '$2a$08$HZafR9ryNG9xAJCKztcrf.1bv1eHEWnaPcMnBOK6F8LHuisDQQ29G', '2013-12-14 23:24:59'),
(104, 'ndtrung', '$2a$08$ggwyDVRT.D1t15E.xxIAKODhR.KQ.HQvW47q3nZfMrSd404yT6Vni', '2013-12-14 23:28:03'),
(105, 'ndtrung', '$2a$08$ByJ10hqyQJBgUEb9J1/E7.zsDXQZfYHTWDDpoTWs1l0VNxxZrujES', '2013-12-14 23:30:26'),
(106, 'ndtrung', '$2a$08$v0zua/ibowaGKa0yJHyQFui09/9ZbU45rgDBjAfeLz9/AGiqmBJJi', '2013-12-14 23:32:52'),
(107, 'ndtrung', '$2a$08$ft8147vA0/krXkvINNl9zO6desdYtE6QgDlf256uVqfq7aRa3iyd2', '2013-12-14 23:35:03'),
(108, 'ndtrung', '$2a$08$tnJ3IwqSo4d13.z5t71n.O8CIRw8k3IPtRnd3F6E1mOazzjLi7Vem', '2013-12-14 23:37:08'),
(109, 'ndtrung', '$2a$08$u00hU3nK069r39vOY4iGyOtjwQ1Lt35z/j87WxhxbNz7Q.7GrCwvy', '2013-12-14 23:41:32'),
(110, 'ndtrung', '$2a$08$W/b.UDMKYSxUlDV8V.AC7uTY6il254Q9f3qRq3UmqP4uDTvl6NiHS', '2013-12-14 23:46:04'),
(111, 'ndtrung', '$2a$08$E/IP0s4nUe1TPG0k8WzJ4.CEJMU8S3dMP9uvmcNydMMV4Cno.vc3K', '2013-12-14 23:54:28'),
(112, 'ndtrung', '$2a$08$dfr5fvGYklTq91WTp7oKlOhSWWrU/aeYfhdY/kBdAhBVZuIv5Mj2e', '2013-12-14 23:58:00'),
(113, 'ndtrung', '$2a$08$lhjsRHRDaCOEM31LwtOXeeNaULr3kAmq4J.32ZOje6Z7d7.8j3DE2', '2013-12-15 00:02:45'),
(114, 'ndtrung', '$2a$08$XKJGyDmWF8HBn8v5TKpymeK1uL4Mwl67..c7fBWZj303YwslIenHG', '2013-12-15 00:07:01'),
(115, 'ndtrung', '$2a$08$KNZ5m0DGyTxvIo62D34kYuZb8.KeFiv4C0iQWqVaSyN0ufgh7DoHC', '2013-12-15 00:09:50'),
(116, 'ndtrung', '$2a$08$lnyK2ICCMlzfVEhkVxkWgOXn7wMFc6mQc7NBWsqBVEf6bXYksecDS', '2013-12-15 00:12:10'),
(117, 'ndtrung', '$2a$08$cQKZmQ3glxOybewdfe/7POHTgoLFXqD.mGRbfrpFVaimi/IYgjkia', '2013-12-15 00:42:23'),
(118, 'ndtrung', '$2a$08$fjhwLYF8xlk8ukQwDP90TepsrHfO/Rec5d3lLgmJU6bqvwJwEtXla', '2013-12-15 00:45:08'),
(119, 'ndtrung', '$2a$08$KPSqLiYhYoBAIlv49CIrBOADgDedL.9EygjDLh49pp06khp.IACvW', '2013-12-15 00:55:14'),
(120, 'ndtrung', '$2a$08$uS6tdp4gKYDJ5TgPtW0wEusUf5QZyoMSdNS81ATYVCqmF3Phoy7Au', '2013-12-15 01:13:45'),
(121, 'ndtrung', '$2a$08$5RkCHj8snyKnM4IaHnX5XubDnFGVKx0vTKLsrC6gMvuVVlAr38zC6', '2013-12-15 01:33:49'),
(122, 'ndtrung', '$2a$08$Q98EXe4A6yJbe.ueKcmzo./niAQVhSbyEsd1p49CeTW1Fg4X6.Gk6', '2013-12-15 01:37:03'),
(123, 'ndtrung', '$2a$08$9K8he40tyrk0g4/IXCu/AeAJeRa3QMYwa/Bs3OQvCvc1kxF5aPjXK', '2013-12-15 01:41:01'),
(124, 'ndtrung', '$2a$08$qzSSPoRwMQ.grSNGX28eKuU0IBgZNILCyzHyGD9JZCMZ4Pf/2W2JW', '2013-12-15 02:15:29'),
(125, 'ndtrung', '$2a$08$BQSXbGsIUe3MZaQCH0BFIOkpaBjt1pkTfkIVEta5JUbHsH6/5jat6', '2013-12-15 02:49:27'),
(126, 'ndtrung', '$2a$08$8Rz8z2J/UHYcp/p3hMkLaOETbAzC5cu4KQwt6UCxi368nOkCoEDNi', '2013-12-15 02:52:43'),
(127, 'ndtrung', '$2a$08$z04XT7VYxpev.DNXsQg0O.cjeIFBO1mgKUEm7xSmqq.RpRN0DKbHe', '2013-12-15 03:34:45'),
(128, 'ndtrung', '$2a$08$yvqzyj93BxVamws5HF/Wh.DR1QLH5QMuDyIc/TZ3dpa5D5xDI6vy6', '2013-12-15 03:39:06'),
(129, 'ndtrung', '$2a$08$cbsvmqdBsCav81C25FLh9.yVLDisvwbc3L.7nAU7jpZ.8qmD4qP9y', '2013-12-15 03:45:52'),
(130, 'ndtrung', '$2a$08$9I.1emFwNFnEX/toUMuto.goALQ82idz/oIdxPncuHGqijlmrw29O', '2013-12-15 12:27:07'),
(131, 'ndtrung', '$2a$08$0OpCo484/U9JbAe4VJasA.BdYK37I9oO2wS.BEhouKcEQj5Dywtbq', '2013-12-15 12:31:03'),
(132, 'ndtrung', '$2a$08$44Tjqc1it0Jp.xm8LrL5pePvKFv7j/4CXLTUdKjyKFw55rLxkoW2O', '2013-12-15 12:34:24'),
(133, 'ndtrung', '$2a$08$VCGlu.NOILXUhdROowGxxeP9yXpADHBoDdE4cQfp12sSNrtZsfefu', '2013-12-15 12:53:37'),
(134, 'ndtrung', '$2a$08$f4Zq7buwdJL9mSvMqcSK7eGg8v0YB1Ctl6kFgUMFTvL5MftszfEnu', '2013-12-15 13:20:08'),
(135, 'ndtrung', '$2a$08$AdGy1VMTyDxyNUgO5TlExOY0iZ1r11EJ7RZjuJPXyNyq/Z.CVhrmu', '2013-12-15 13:23:01'),
(136, 'ndtrung', '$2a$08$Gzem.mgc4w9pEH7gkA0Udez2mH98Wii73mi6XlHwliOXSqlYgOAEi', '2013-12-15 13:27:04'),
(137, 'ndtrung', '$2a$08$b40ypuaEvfx6aOo3UZWcIuim.6jNpEt9yGsBsxCGK.aE2jTjfocza', '2013-12-15 13:41:01'),
(138, 'ndtrung', '$2a$08$7SRJukCl9jet8vCy6ZmoB.roWtl/BGWKQu3LXd8Q/vIdzXFYJ6f3W', '2013-12-15 13:48:50'),
(139, 'ndtrung', '$2a$08$Y9jn2PKlNNJXnKRz0eOLAeVYOInHiOEd.hHyTu7kBwETMZuTWysES', '2013-12-15 13:50:42'),
(140, 'ndtrung', '$2a$08$.M6DvZDjZcPD1ST.06Epu.xDVVa0Y.HOpz/6nd8USazcbnYzhg5P2', '2013-12-15 14:38:18'),
(141, 'ndtrung', '$2a$08$hd/fkJyz79LUf1r7uteytOQcd9wiBPSLzrU6foZLjs.NtTY7K/EIu', '2013-12-15 14:43:03'),
(142, 'ndtrung', '$2a$08$W52JRf5Hqqn9w5M1RyF6..0RBd7vGt8znCgra1M.AqG35LnYxVAkm', '2013-12-15 14:44:52'),
(143, 'ndtrung', '$2a$08$fDyFbO340dq9UExMLXRlEONL85ip6fLAsK4butXVwAOki8llLymje', '2013-12-15 14:46:41'),
(144, 'ndtrung', '$2a$08$t7jc34OXEqXFJRWAD1EthuI5zvb/FWGdIRI/8nz4UF/Yns4wb8dJ.', '2013-12-15 14:49:10'),
(145, 'ndtrung', '$2a$08$nBlHH9rbhHeyDfO.Aq09euXoLNbrotkHzO/CD2RMFcyGdCCCRrz8.', '2013-12-15 14:51:18'),
(146, 'ndtrung', '$2a$08$CgNwCPMSlaSxLJ7uQLllGu16VAK9taW2fdgQzgtUXUMo219lvaA1e', '2013-12-15 14:55:23'),
(147, 'ndtrung', '$2a$08$Z7SmKdbiJb4Rp4KRsj/KTOosc.vpECSAvHYODo5ePjy0dv6x7W4Pu', '2013-12-15 14:57:15'),
(148, 'ndtrung', '$2a$08$9HNe18cv/zqdsXYCYAwteOqPOnqKiO1oaK/OXPnEPqZzccxv5Eb3W', '2013-12-15 14:58:52'),
(149, 'ndtrung', '$2a$08$gGzPqcyZA7/XlosrBDiRXu.fAyBkA1YKqoe9krOtrgiCyNkPb0DbC', '2013-12-15 15:02:45'),
(150, 'ndtrung', '$2a$08$YZMhkFREz4UQ09/V/UpYLuaiQ3T7e.6QVpLJdBn87KqqxmaObfbeC', '2013-12-15 15:12:21'),
(151, 'ndtrung', '$2a$08$ZlrdJoXHaaRdsucDs2FM9eR7U8KUED7E0vWrlWUmccnaMQYf5I9t2', '2013-12-15 15:13:58'),
(152, 'ndtrung', '$2a$08$sBCIQoE0irTSJP6T5q70PedwriK4M07ug9/Jji5r2D1ii5Lom8Bra', '2013-12-15 15:16:31'),
(153, 'ndtrung', '$2a$08$mRkZDaYPizIPIsmLwGRrY.shmiZeetAdFNhXnnyEm2/nh60Z5G5he', '2013-12-15 15:19:59'),
(154, 'ndtrung', '$2a$08$cfNMtXGsW1GlBF17AElkoOkD8MQNKCgat9XvF0tzBXSKCQWVeL3hu', '2013-12-15 15:21:32'),
(155, 'ndtrung', '$2a$08$t7HilZ12JA9HhzRSb6lUOO/mh/4stxkamo0JdhFEFTAxtISXocD66', '2013-12-15 15:23:16'),
(156, 'ndtrung', '$2a$08$xX1pCpANNCWdXM1fYd396euUPmhBHDqgvxeSpvjpAouGxpIy4wV/2', '2013-12-15 15:24:28'),
(157, 'ndtrung', '$2a$08$w2dIZKSgVVu/CYO7t/R9/OWP9LoFDEqkmbmFjDSuGOyManmBj3jom', '2013-12-15 15:25:37'),
(158, 'ndtrung', '$2a$08$4uHKjfZ6.xIe6.9XdSK.bOa/Xt/WlB4Y0tRLbAo3yuIL7uw2CaCV6', '2013-12-15 15:27:33'),
(159, 'ndtrung', '$2a$08$FaOSVd80RLTet4L3Et7bVeMJ9O5fX1UUJ3vBFzRnNN8/2T35xdu1m', '2013-12-15 15:39:00'),
(160, 'ndtrung', '$2a$08$s6DUqq1yEQ5nCxKKeApTOu39a8oFQ0u0x20MxoQUmaleiAzfVZKB.', '2013-12-15 16:24:43'),
(161, 'ndtrung', '$2a$08$nBwTgBtpcatZJZbYgM9iseBucr72kuq2kRCrpIWxt8EsAYGk9gLjy', '2013-12-15 16:35:33'),
(162, 'ndtrung', '$2a$08$QidixjPpqTiDBqv4W5fIyOmJwjNzrLsvPenQDeq/RZ.DChBm96UHm', '2013-12-15 16:39:31'),
(163, 'ndtrung', '$2a$08$pceOQ1hSwumjm/ewK1gM.eVwQzJt1G4ujN/d3H2laYRUPxfMF1Lfe', '2013-12-15 16:43:04'),
(164, 'ndtrung', '$2a$08$Dc8A9lw1Jx6bWR/NtRBaO.nKg4BUQ7MJrCnMRlbz.3Wb2cTDhKfB6', '2013-12-15 16:50:45'),
(165, 'ndtrung', '$2a$08$753PFQTBogNiFUbxhBwAWu1g9rBVMqr7OIpaKTTPNOoDgxes5wwQ.', '2013-12-15 16:57:30'),
(166, 'ndtrung', '$2a$08$uzGKi3RU/otyojnuA5AUVO7TSMTJGwOwWGjQ5cryUgcu94zrXHBse', '2013-12-15 17:07:27'),
(167, 'ndtrung', '$2a$08$tY3lHuMCNbCxBTfonLwrke6YRbo3sl6P8q8BbUKKo7fZwB2opNZwa', '2013-12-15 17:53:19'),
(168, 'ndtrung', '$2a$08$eUShjvBlqTyRBjwm6BHev.Yg12h.IQ40K.Z6kF92WW.2oKt8sWbjm', '2013-12-15 18:38:45'),
(169, 'ndtrung', '$2a$08$kckWJe.uSAV9gj/Lzqt7ZewIfcjK62hM2PD1sT/ez/oXY3EGBHRUe', '2013-12-15 18:50:06'),
(170, 'ndtrung', '$2a$08$z9qSMpS5NUTe90jxPEp/juYz0Cfka7haPg2dsLihM/iQ6eT1/w9Vq', '2013-12-15 18:55:02'),
(171, 'ndtrung', '$2a$08$qT/HXxHT/Fk/C.gbZQXKm.zNvf6r5whlsBxTJjkYFmDLgTswEyxtu', '2013-12-15 18:57:04'),
(172, 'ndtrung', '$2a$08$64y8HWt3bi1iT.l.zzQrDeZ5ffmYzdjqlTZL.NEetNW9eY3tU0FWO', '2013-12-15 19:37:25'),
(173, 'ndtrung', '$2a$08$574k6CXI5dF97Z90M5nwmeOL4uWNgk8kxGwFKUUmQyr3gDC2vy.RK', '2013-12-15 19:44:48'),
(174, 'ndtrung', '$2a$08$ADGXyNQS4479gt2hGE6pl.lwPpX9LCpbSwBbBcLwW.tG3dHMSxfVq', '2013-12-15 20:04:23'),
(175, 'ndtrung', '$2a$08$WJqgY50b.9TOz.iIT9ftw.MCa7ICDML1dGmFqm2uERipuqr.d.Ox.', '2013-12-15 20:07:29'),
(176, 'ndtrung', '$2a$08$3QhdW5wF3UCZwxLo0.R2UeMXmBnBgCA97e9ZxvSMXghKcyzeNVJbS', '2013-12-15 20:20:03'),
(177, 'ndtrung', '$2a$08$SND5bF.U5BJ1PPF2ZfaumO0nDPVPGdAG6qk.uHEbEvWWhe0fuNW7K', '2013-12-15 20:25:08'),
(178, 'ndtrung', '$2a$08$Jg7Jw6kIhAQGu/0tb8h38OjmW254n.JqdIs0Ak97rflvbnfVVh9fa', '2013-12-15 20:31:18'),
(179, 'ndtrung', '$2a$08$UgBoJwtZdkUhNaSfj6N4xOE3Nf5UBrXBBcN278KpvnMGW47PPGfNu', '2013-12-15 20:35:06'),
(180, 'ndtrung', '$2a$08$2GzVwStMCvPL1kgvDES5vOT2JIm4UBeAqLRI8Ikfb/0suwqhV8paq', '2013-12-15 21:53:02'),
(181, 'ndtrung', '$2a$08$NSwIwxkrUefz2It7kmBqQeZo3VnUnO1bc/8mp7Mh2iHYiC4uK6VT2', '2013-12-15 22:11:58'),
(182, 'ndtrung', '$2a$08$847lWqNe0KpEmBMZ4TCn9u.bdytLWMqeR8LTXSv4NFAADmLTc.3Fa', '2013-12-15 23:52:56'),
(183, 'ndtrung', '$2a$08$1FO/GVdKoBVSah7URnBqHOZIgDJh1.I4meS5L3n9VNyG8EFxY9CMO', '2013-12-16 00:04:31'),
(184, 'ndtrung', '$2a$08$nRvljBi.FL8wY/ixi7BSoewG9ia167BI6nEAdQKYzvYHx2UEKIHDm', '2013-12-16 00:12:05'),
(185, 'ndtrung', '$2a$08$eQh7fQ3GUvrpevXk5/wbZewpT7gejctM0bciUKV65K2UA4MkBzYFm', '2013-12-16 00:15:00'),
(186, 'ndtrung', '$2a$08$WJhwuxuK4X7LN9hBtdDWwe/RdsEIfOhqn0DwShCEJ5UKgvupKgaJG', '2013-12-16 00:23:33'),
(187, 'ndtrung', '$2a$08$MVpuRi4B.3j2Xb2qMtHQd.n51kTl1WsMxTAhGIZJXbTn23fjQG2j2', '2013-12-16 00:36:04'),
(188, 'ndtrung', '$2a$08$LRTv3dJdUG/4lGTUWISFx.VhQx3hk.gtr1pcVyT/gf9.Gxi40EQ0G', '2013-12-16 00:49:04'),
(189, 'ndtrung', '$2a$08$IFgKmnZjM3axw9vedENPJ.4dcSNmdn1HTYqdPbPe6BXXrnWq/Clye', '2013-12-16 00:54:33'),
(190, 'ndtrung', '$2a$08$vwgWjC5MH5kfNzQyb91ZfOGqE41irIBMi8rjXldX2Ibj.pszU/knW', '2013-12-16 00:56:48'),
(191, 'ndtrung', '$2a$08$qZz3MUli8ssTaSc/ziZfVu/gK3k2dsAMt9sPMB9tMdgEnjNvfOVBG', '2013-12-16 01:00:51'),
(192, 'ndtrung', '$2a$08$SFf/jKcdl62HZ10..AT0C.Rgnn1QQv2c3G3Vgu80fxu4Klstdp74G', '2013-12-16 01:02:42'),
(193, 'ndtrung', '$2a$08$oOwM2FouZJFhLsAS0oxMHOaLAUSzak1E1Ef4CfzJM.Vm9cv8ZgVOK', '2013-12-16 01:42:16'),
(194, 'ndtrung', '$2a$08$U3jkdRR876CtYcCd618pc.vO0r5o9d5SShsDVG.0pOcMuphQ5jQL.', '2013-12-16 02:01:01'),
(195, 'ndtrung', '$2a$08$mZlaPFAYcIHebsjUuMaGqOHhNI5z9wT1A/4VGrus0CJtaA3oohPGC', '2013-12-16 02:03:21'),
(196, 'ndtrung', '$2a$08$81g0vBPMzYo2eMFSdfLZjOoMJ5alYkQOCDNs3RLLsKpCWN01Rpnau', '2013-12-16 02:20:46'),
(197, 'ndtrung', '$2a$08$ec5cjzLAKxoCDzKGb.u1q.G0wl0Nf32JgWd3kcOqDkgYXMnu/1h.K', '2013-12-16 02:25:34'),
(198, 'ndtrung', '$2a$08$JRwUs83eiQC7lx9wDFefAOdGomIJrRdOuUjgeaVZjfBdhUv.qA2t2', '2013-12-16 02:29:30'),
(199, 'ndtrung', '$2a$08$lh8II.hlPVXaxCp6KAWZ..RFThh5e/YZGJ63iIaRqeWMZL1sOQueS', '2013-12-16 02:31:48'),
(200, 'ndtrung', '$2a$08$UCc4qUG6vw9XiOkjTEe9WOjVec.v7OBj76BS.8lrLNcZoXYqh8VE6', '2013-12-16 02:36:13'),
(201, 'ndtrung', '$2a$08$2gJi.cUNou/rG8Z1zWaiwu0R9w4m3tdgoQnIr4xPYaGoO6aY55mMy', '2013-12-16 02:53:07'),
(202, 'ndtrung', '$2a$08$COeAREjiHSi9KXpjFOQ2QuenudnNLAu9YgIx9WZqLmRilZCRe/Hbq', '2013-12-16 03:03:06'),
(203, 'ndtrung', '$2a$08$n7a.9.7D2IPi0Ct7nsfkCe.ywUM/393Fx4Mgvf9LUqMar4rV458.i', '2013-12-16 03:04:40'),
(204, 'ndtrung', '$2a$08$nKtcSyyInaJeODpOPqpm3OFsat.WkYiQ/uw1N8LITJUzrlQ81n80W', '2013-12-16 03:09:38'),
(205, 'ndtrung', '$2a$08$l/Ephn0I1cAYR22yTeF2decZZ4M9fDRW9MD92G1jlzr4KmncOe2j.', '2013-12-16 03:13:52'),
(206, 'ndtrung', '$2a$08$aOZ5FcHIZBb18vwiU7iNw.4GCuEdQA4f6J2REckkCCx/XNjsRHj5O', '2013-12-16 03:17:26'),
(207, 'ndtrung', '$2a$08$Qw0aWzIbAv.LPLGBxjBZuOpDNxusTVP3/UC5d4e7pCR8beePjypMG', '2013-12-16 03:20:40'),
(208, 'ndtrung', '$2a$08$XkgdsPFCOyAtdmllIcUSu.LHksUneXVpz5QbN9mFxtxRU0aiFUrv.', '2013-12-16 03:23:35'),
(209, 'ndtrung', '$2a$08$cYf8Kng4cTsGvcvJb7Ho0ulO6Dpib5dzQcWM3dsfLG46PRTmz0WAm', '2013-12-16 03:25:13'),
(210, 'ndtrung', '$2a$08$OfEmG5BbMiYuuCtlt2NwjujKQxHYmwtMtHyRCAOXQ8p4ajc6yXssi', '2013-12-16 03:28:05'),
(211, 'ndtrung', '$2a$08$/pEw5/Y3WL3xPZtjkKxQYe0wUb/kSix.aVlCw2GjviViZC0fb9ad6', '2013-12-19 16:40:56'),
(212, 'ndtrung', '$2a$08$BzfpvPp3nYIqrjvcxnVUwuLz/nBgKE0hRlGUSw6M5F/FWrbG7pBqm', '2013-12-22 17:25:10'),
(213, 'ndtrung', '$2a$08$ETgFDejeDJzfAtfRki/cxOnjzmUa09uM9GwpcTdwsAZrpC1uVqpGa', '2013-12-22 17:29:32'),
(214, 'ndtrung', '$2a$08$x/u5H/7K5DjHMtxlYkD9fu9nvvM/rn3Eu4umsflfuLn/VA8iyf4.W', '2013-12-24 03:42:15'),
(215, 'ndtrung', '$2a$08$ztD7sWLZi58PFDliz8sIa.VIrHGNFa3PnX6evd1ulTrP9fNIRQ5oq', '2013-12-24 03:44:59'),
(216, 'ndtrung4', '$2a$08$vKfSQmywvLjY6/l8ReWra.IvFpB3qMIBefybJO02dAgPFXXc3UTRC', '2013-12-24 16:33:35'),
(217, 'ndtrung', '$2a$08$BsiQzYT7Z2HbqM/tfMNeYeSne0TIU00NHbdbygZhQ.gUnZ8BxllYe', '2013-12-24 21:48:17'),
(218, 'ndtrung', '$2a$08$FmUSJmBBzHCLDy7Vb3yKNOWIlBi8xDH1Vc.Uizh21aY3sB8VLkrwG', '2013-12-24 22:09:51'),
(219, 'ndtrung', '$2a$08$bHtbZ0WqE8wXzzXaN9Ewc.iRi6R1EUM72wKpEKc1fqiGydc9hxFH6', '2013-12-24 22:10:00'),
(220, 'ndtrung', '$2a$08$51Znp7Qckv7A1PZJJJxQlO0.7w44Tk2qJc463FPflVHum08bLzL.W', '2013-12-25 01:06:36'),
(221, 'ndtrung', '$2a$08$w1O2b2EqIj3GwrdRhPvRAuCHFGpyUCh4hpi6QPF7/ScAgZ39G5Qba', '2013-12-25 01:06:45'),
(222, 'ndtrung', '$2a$08$3KwirlplXU554ksCDNVvQupzRzXR6/irmPE33AnwNdc6MRjaj/nX6', '2013-12-25 19:21:42'),
(223, 'fbndtrung', '$2a$08$rg3fI.TLgtDV6v2jf4jvOenwn/KZTRYHRC4gHv9X/wLWqlhZkYIMS', '2014-02-02 20:51:36'),
(224, 'fbndtrung', '$2a$08$OvWpOI5FKyaH33Gyx2DzaeVpcaw4Ywwa5blnC/x4jf4Xwt/.C1LiG', '2014-02-02 22:43:24'),
(225, 'fbndtrung3', '$2a$08$ffXtMzI1E/z5km6n1iTdNelzzRSq2s8rCyidFnBCO1QIKHDWm8Iui', '2014-02-02 22:43:34'),
(226, 'fbndtrung3', '$2a$08$iJ4sKzbHinQ2IpOEhbIaAu001OcYa.yxqjxTWI1h2jcvEpaAhL5CO', '2014-02-02 22:45:12'),
(227, 'fbndtrung3', '$2a$08$xHkFVAAmTW4GzaPAN4eileyBQ.VT67keo2PKgQ7jqFr82edKuQ6JK', '2014-02-02 22:46:20'),
(228, 'fbndtrung', '$2a$08$4z2dRRUZwB7tgZRwOipIwuGfN1Ll9lN6zseVKOj.izKjPucHwpOwu', '2014-02-02 22:46:26'),
(229, 'fbndtrung', '$2a$08$27ymn9zMNmRNRfc6qpsD1OlZ/leZ6EkI07L8GWg/SNLy6816Pidn6', '2014-02-02 22:46:31'),
(230, 'fbndtrung', '$2a$08$9dHHwO4mkTyqGnV0bxC7fuJSxwPL3DmeJYjCNBKG3TzeyfnXSihFC', '2014-02-02 22:46:39'),
(231, 'fbndtrung', '$2a$08$ge5ho7J8oFjKkm63VMSvLOlPBu.jjOkfc1mIwOc92iNnaj9nvMcOe', '2014-02-02 22:47:19'),
(232, 'fbndtrung', '$2a$08$i69eSxkMWNh29II1xqp5O.UnIUB2iELIqBBg.dScNuT6sJ0N7azO6', '2014-02-02 22:47:23'),
(233, 'ndtrung1@yahoo.com3', '$2a$08$0f0PAjqruaIuYwISZLt0iu.zWB1iqvbd0GZrV86wCvEQqLY8TZa0m', '2014-02-02 23:30:27'),
(234, 'ndtrung1@yahoo.com2', '$2a$08$QwmjTUgkQ4sNLbLju.Mqru4Xo3LY5V1KPMoodKe9BDjcO89D7DrGO', '2014-02-02 23:30:36');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE IF NOT EXISTS `history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `keyword` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=75 ;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `username`, `keyword`, `time`) VALUES
(1, 'ndtrung', 'love+me', '2013-12-24 03:23:52'),
(2, 'ndtrung', 'anh+yeu+em', '2013-12-24 03:47:41'),
(3, 'ndtrung', 'anh+yeu+em', '2013-12-24 03:48:59'),
(4, 'ndtrung', 'anh+ba+hung', '2013-12-24 13:17:34'),
(5, 'ndtrung', 'anh+ba+hung', '2013-12-24 13:18:15'),
(6, 'ndtrung', 'anh+ba+hung', '2013-12-24 13:18:29'),
(7, 'ndtrung', 'anh+ba+hung', '2013-12-24 13:19:27'),
(8, 'ndtrung', 'anh%20ba%20hung', '2013-12-24 13:22:01'),
(9, 'ndtrung', 'anh%20ba%20hung', '2013-12-24 13:22:30'),
(10, 'ndtrung', 'anh%20ba%20hung', '2013-12-24 13:23:02'),
(11, 'ndtrung', 'anh%20ba%20hung', '2013-12-24 13:23:44'),
(12, 'ndtrung', 'anh+ba+hung', '2013-12-24 13:24:28'),
(13, 'ndtrung', 'proud+of+you', '2013-12-24 13:24:44'),
(14, 'ndtrung', 'breathless', '2013-12-24 13:25:03'),
(15, 'ndtrung', 'breathless', '2013-12-24 13:25:30'),
(16, 'ndtrung', 'breathless', '2013-12-24 13:30:54'),
(17, 'ndtrung', 'breathless', '2013-12-24 13:34:04'),
(18, 'ndtrung', 'breathless', '2013-12-24 13:34:23'),
(19, 'ndtrung', 'breathless', '2013-12-24 13:35:32'),
(20, 'ndtrung', 'breathless', '2013-12-24 13:42:30'),
(21, 'ndtrung', 'breathless', '2013-12-24 13:42:57'),
(22, 'ndtrung', 'breathless', '2013-12-24 13:44:21'),
(23, 'ndtrung', 'breathless', '2013-12-24 13:45:38'),
(24, 'ndtrung', 'breathless', '2013-12-24 13:46:58'),
(25, 'ndtrung', 'breathless', '2013-12-24 13:51:31'),
(26, 'ndtrung', 'breathless', '2013-12-24 13:55:50'),
(27, 'ndtrung', 'breathless', '2013-12-24 13:57:02'),
(28, 'ndtrung', 'breathless', '2013-12-24 13:57:56'),
(29, 'ndtrung', 'breathless', '2013-12-24 13:58:09'),
(30, 'ndtrung', 'breathless', '2013-12-24 13:58:45'),
(31, 'ndtrung', 'breathless', '2013-12-24 13:59:13'),
(32, 'ndtrung', 'breathless', '2013-12-24 14:08:46'),
(33, 'ndtrung', 'love', '2013-12-24 14:08:56'),
(34, 'ndtrung', 'love', '2013-12-24 14:09:35'),
(35, 'ndtrung', 'you', '2013-12-24 14:09:44'),
(36, 'ndtrung', 'you', '2013-12-24 14:11:36'),
(37, 'ndtrung', 'you', '2013-12-24 14:20:01'),
(38, 'ndtrung', 'you', '2013-12-24 14:21:10'),
(39, 'ndtrung', 'you', '2013-12-24 14:21:51'),
(40, 'ndtrung', 'friend', '2013-12-24 14:22:04'),
(41, 'ndtrung', 'friend', '2013-12-24 14:22:32'),
(42, 'ndtrung', 'anh+yeu+em', '2013-12-24 14:24:17'),
(43, 'ndtrung', 'tinh+khuc+vang', '2013-12-24 14:25:09'),
(44, 'ndtrung', 'love++you', '2013-12-24 14:26:22'),
(45, 'ndtrung', 'love+you', '2013-12-24 14:26:39'),
(46, 'ndtrung', 'anh', '2013-12-24 14:33:28'),
(47, 'ndtrung', 'anh', '2013-12-24 16:40:24'),
(48, 'ndtrung', 'anh', '2013-12-24 16:40:58'),
(49, 'ndtrung', 'anh', '2013-12-25 01:57:34'),
(50, 'ndtrung', 'like+you', '2013-12-25 16:20:06'),
(51, 'ndtrung', 'like+you', '2013-12-25 16:20:10'),
(52, 'ndtrung', 'love', '2013-12-25 16:20:14'),
(53, 'ndtrung', 'here', '2013-12-25 16:20:22'),
(54, 'ndtrung', 'where', '2013-12-25 16:21:11'),
(55, 'ndtrung', 'breath', '2013-12-25 16:57:10'),
(56, 'ndtrung', 'breathles', '2013-12-25 17:10:17'),
(57, 'ndtrung', 'breathles', '2013-12-25 17:11:10'),
(58, 'ndtrung', 'breathless', '2013-12-25 17:11:45'),
(59, 'ndtrung', 'breath', '2013-12-25 17:12:50'),
(60, 'ndtrung', 'anh', '2013-12-25 19:22:03'),
(61, 'ndtrung', 'breath', '2013-12-25 19:22:59'),
(62, 'ndtrung', 'you', '2013-12-25 19:26:55'),
(63, 'ndtrung', 'brea', '2013-12-25 19:36:16'),
(64, 'ndtrung', 'brea', '2013-12-25 19:42:09'),
(65, 'ndtrung', 'brea', '2013-12-25 19:42:34'),
(66, 'ndtrung', 'love', '2013-12-25 19:53:31'),
(67, 'ndtrung', 'anh', '2013-12-25 19:54:25'),
(68, 'ndtrung', 'anh', '2013-12-25 20:20:19'),
(69, 'ndtrung', 'anh', '2013-12-25 22:03:20'),
(70, 'ndtrung', 'yeu', '2013-12-25 23:42:14'),
(71, 'ndtrung', 'anh+ba+hun', '2013-12-26 00:19:20'),
(72, 'ndtrung', 'anh+ba+hung', '2013-12-26 00:19:25'),
(73, 'ndtrung', 'when+you+believe', '2013-12-26 00:30:20'),
(74, 'ndtrung', 'co+be+mua+dong', '2013-12-26 22:14:16');

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE IF NOT EXISTS `record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(400) NOT NULL,
  `songid` varchar(10) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ismixed` tinyint(1) NOT NULL DEFAULT '1',
  `username` varchar(60) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `record`
--

INSERT INTO `record` (`id`, `url`, `songid`, `time`, `ismixed`, `username`) VALUES
(1, 'http://localhost:8888/karaoke/upload/1391445147635270283071928083.wav', 'L42523', '2014-02-03 16:32:27', 1, 'ndtrung');

-- --------------------------------------------------------

--
-- Table structure for table `song`
--

CREATE TABLE IF NOT EXISTS `song` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customID` char(20) DEFAULT NULL,
  `author` varchar(60) DEFAULT NULL,
  `singer` varchar(60) NOT NULL,
  `category` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `beatURL` varchar(255) NOT NULL,
  `lyricURL` varchar(255) DEFAULT NULL,
  `alias` varchar(100) DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `lyric` text,
  `karaoke` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `customID_2` (`customID`),
  KEY `customID` (`customID`),
  KEY `customID_3` (`customID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=102 ;

--
-- Dumping data for table `song`
--

INSERT INTO `song` (`id`, `customID`, `author`, `singer`, `category`, `beatURL`, `lyricURL`, `alias`, `title`, `lyric`, `karaoke`) VALUES
(101, 'L6272', '', 'Jay-Z Feat. Alicia Keys', '', 'https://lvassets1.s3.amazonaws.com/tracks/9c722a6aa116711ddffb67aff85a49e88c4c0536.mp3', '', 'ESOM', 'Empire State Of Mind', '', '{"sentences":[{"words":[{"content":"Jay-Z","start":0,"end":3740,"gender":1}]},{"words":[{"content":"Alicia Keys","start":3740,"end":7480,"gender":2}]},{"words":[{"content":"Yeah","start":9350,"end":9960,"gender":1}]},{"words":[{"content":"Yeah, ","start":10100,"end":10340,"gender":1},{"content":"I''m ","start":10350,"end":10600,"gender":1},{"content":"out ","start":10610,"end":10790,"gender":1},{"content":"that ","start":10800,"end":11030,"gender":1},{"content":"Brook","start":11040,"end":11360,"gender":1},{"content":"lyn","start":11370,"end":11580,"gender":1}]},{"words":[{"content":"now ","start":11690,"end":11870,"gender":1},{"content":"I''m ","start":11880,"end":12070,"gender":1},{"content":"down ","start":12080,"end":12260,"gender":1},{"content":"in ","start":12270,"end":12450,"gender":1},{"content":"Tri","start":12460,"end":12720,"gender":1},{"content":"be","start":12730,"end":12910,"gender":1},{"content":"ca","start":12920,"end":13100,"gender":1}]},{"words":[{"content":"right ","start":13110,"end":13280,"gender":1},{"content":"next ","start":13290,"end":13470,"gender":1},{"content":"to ","start":13480,"end":13650,"gender":1},{"content":"De ","start":13660,"end":13880,"gender":1},{"content":"Ni","start":13890,"end":14130,"gender":1},{"content":"ro","start":14140,"end":14420,"gender":1}]},{"words":[{"content":"but ","start":14430,"end":14610,"gender":1},{"content":"I''ll ","start":14620,"end":14800,"gender":1},{"content":"be ''","start":14810,"end":15000,"gender":1},{"content":"hood ","start":15010,"end":15180,"gender":1},{"content":"for","start":15190,"end":15380,"gender":1},{"content":"ev","start":15390,"end":15580,"gender":1},{"content":"er","start":15590,"end":15800,"gender":1}]},{"words":[{"content":"I''m ","start":15810,"end":15990,"gender":1},{"content":"the ","start":16000,"end":16190,"gender":1},{"content":"new ","start":16200,"end":16389,"gender":1},{"content":"Sin","start":16400,"end":16590,"gender":1},{"content":"at","start":16600,"end":16850,"gender":1},{"content":"ra","start":16860,"end":17220,"gender":1}]},{"words":[{"content":"and ","start":17330,"end":17510,"gender":1},{"content":"since ","start":17520,"end":17700,"gender":1},{"content":"I ","start":17710,"end":17900,"gender":1},{"content":"made ","start":17910,"end":18110,"gender":1},{"content":"it ","start":18120,"end":18340,"gender":1},{"content":"here","start":18350,"end":18580,"gender":1}]},{"words":[{"content":"I ","start":18590,"end":18780,"gender":1},{"content":"can ","start":18790,"end":18990,"gender":1},{"content":"make ","start":19000,"end":19180,"gender":1},{"content":"it ","start":19190,"end":19340,"gender":1},{"content":"an","start":19350,"end":19520,"gender":1},{"content":"yw","start":19530,"end":19710,"gender":1},{"content":"here","start":19720,"end":19970,"gender":1}]},{"words":[{"content":"yeah, ","start":19980,"end":20140,"gender":1},{"content":"they ","start":20150,"end":20330,"gender":1},{"content":"love ","start":20340,"end":20520,"gender":1},{"content":"me","start":20530,"end":20700,"gender":1}]},{"words":[{"content":"ev","start":20710,"end":20890,"gender":1},{"content":"ery","start":20900,"end":21070,"gender":1},{"content":"where","start":21080,"end":21280,"gender":1}]},{"words":[{"content":"I ","start":21280,"end":21380,"gender":1},{"content":"used ","start":21390,"end":21580,"gender":1},{"content":"to ","start":21590,"end":21770,"gender":1},{"content":"cop ","start":21780,"end":21960,"gender":1},{"content":"in ","start":21970,"end":22160,"gender":1},{"content":"Har","start":22170,"end":22420,"gender":1},{"content":"lem","start":22430,"end":22630,"gender":1}]},{"words":[{"content":"all ","start":22750,"end":22930,"gender":1},{"content":"of ","start":22940,"end":23110,"gender":1},{"content":"my ","start":23120,"end":23300,"gender":1},{"content":"Do","start":23310,"end":23470,"gender":1},{"content":"mi","start":23480,"end":23660,"gender":1},{"content":"ni","start":23670,"end":23840,"gender":1},{"content":"ca","start":23850,"end":24020,"gender":1},{"content":"no''s","start":24030,"end":24190,"gender":1}]},{"words":[{"content":"right ","start":24200,"end":24350,"gender":1},{"content":"there ","start":24360,"end":24520,"gender":1},{"content":"up ","start":24530,"end":24700,"gender":1},{"content":"on ","start":24710,"end":24890,"gender":1},{"content":"Broad","start":24900,"end":25200,"gender":1},{"content":"way","start":25210,"end":25410,"gender":1}]},{"words":[{"content":"pull ","start":25530,"end":25700,"gender":1},{"content":"me ","start":25710,"end":25890,"gender":1},{"content":"back ","start":25900,"end":26070,"gender":1},{"content":"to","start":26080,"end":26260,"gender":1}]},{"words":[{"content":"that ","start":26270,"end":26470,"gender":1},{"content":"McD","start":26480,"end":26650,"gender":1},{"content":"on","start":26660,"end":26840,"gender":1},{"content":"ald''s","start":26850,"end":27020,"gender":1}]},{"words":[{"content":"Tuck ","start":27030,"end":27220,"gender":1},{"content":"in","start":27230,"end":27410,"gender":1},{"content":"to ","start":27420,"end":27600,"gender":1},{"content":"my ","start":27610,"end":27770,"gender":1},{"content":"stash","start":27780,"end":28030,"gender":1},{"content":"box","start":28040,"end":28290,"gender":1}]},{"words":[{"content":"Five-","start":28300,"end":28500,"gender":1},{"content":"six","start":28510,"end":28710,"gender":1},{"content":"ty ","start":28720,"end":28990,"gender":1},{"content":"State ","start":29000,"end":29350,"gender":1},{"content":"Street","start":29360,"end":29660,"gender":1}]},{"words":[{"content":"catch ","start":29670,"end":29860,"gender":1},{"content":"me ","start":29870,"end":30040,"gender":1},{"content":"in ","start":30050,"end":30230,"gender":1},{"content":"the ","start":30240,"end":30410,"gender":1},{"content":"Kit","start":30420,"end":30590,"gender":1},{"content":"chen","start":30600,"end":30770,"gender":1}]},{"words":[{"content":"like ","start":30780,"end":30950,"gender":1},{"content":"the ","start":30960,"end":31130,"gender":1},{"content":"Sim","start":31140,"end":31300,"gender":1},{"content":"mons","start":31310,"end":31480,"gender":1}]},{"words":[{"content":"with ","start":31490,"end":31670,"gender":1},{"content":"them ","start":31680,"end":31860,"gender":1},{"content":"pas","start":31870,"end":32150,"gender":1},{"content":"try","start":32159,"end":32430,"gender":1}]},{"words":[{"content":"Crui","start":32430,"end":32600,"gender":1},{"content":"sin'' ","start":32610,"end":32850,"gender":1},{"content":"down ","start":32860,"end":33159,"gender":1},{"content":"Eighth ","start":33170,"end":33500,"gender":1},{"content":"Street","start":33510,"end":33780,"gender":1}]},{"words":[{"content":"off-","start":33890,"end":34200,"gender":1},{"content":"white ","start":34210,"end":34540,"gender":1},{"content":"Le","start":34550,"end":34850,"gender":1},{"content":"xus","start":34860,"end":35130,"gender":1}]},{"words":[{"content":"dri","start":35140,"end":35360,"gender":1},{"content":"vin'' ","start":35370,"end":35590,"gender":1},{"content":"so ","start":35600,"end":35930,"gender":1},{"content":"slow","start":35940,"end":36230,"gender":1}]},{"words":[{"content":"but ","start":36240,"end":36420,"gender":1},{"content":"B.","start":36430,"end":36620,"gender":1},{"content":"K. ","start":36630,"end":36840,"gender":1},{"content":"is ","start":36850,"end":37040,"gender":1},{"content":"from ","start":37050,"end":37280,"gender":1},{"content":"Tex","start":37290,"end":37610,"gender":1},{"content":"as","start":37620,"end":37890,"gender":1}]},{"words":[{"content":"Me, ","start":37990,"end":38170,"gender":1},{"content":"I''m ","start":38180,"end":38360,"gender":1},{"content":"out ","start":38370,"end":38560,"gender":1},{"content":"that ","start":38570,"end":38780,"gender":1},{"content":"bed-","start":38790,"end":39090,"gender":1},{"content":"stuy","start":39100,"end":39390,"gender":1}]},{"words":[{"content":"home ","start":39400,"end":39580,"gender":1},{"content":"of ","start":39590,"end":39780,"gender":1},{"content":"that ","start":39790,"end":39980,"gender":1},{"content":"boy ","start":39990,"end":40220,"gender":1},{"content":"Big","start":40230,"end":40520,"gender":1},{"content":"gie","start":40530,"end":40740,"gender":1}]},{"words":[{"content":"now ","start":40750,"end":40940,"gender":1},{"content":"I ","start":40950,"end":41140,"gender":1},{"content":"live ","start":41150,"end":41350,"gender":1},{"content":"on ","start":41360,"end":41540,"gender":1},{"content":"bill","start":41550,"end":41810,"gender":1},{"content":"board","start":41820,"end":42030,"gender":1}]},{"words":[{"content":"and ","start":42150,"end":42320,"gender":1},{"content":"I ","start":42330,"end":42510,"gender":1},{"content":"brought","start":42520,"end":42690,"gender":1}]},{"words":[{"content":"my ","start":42700,"end":42900,"gender":1},{"content":"boys ","start":42910,"end":43170,"gender":1},{"content":"with ","start":43180,"end":43360,"gender":1},{"content":"me","start":43370,"end":43560,"gender":1}]},{"words":[{"content":"Say ","start":43570,"end":43760,"gender":1},{"content":"what ","start":43770,"end":43930,"gender":1},{"content":"up ","start":43940,"end":44120,"gender":1},{"content":"to ","start":44130,"end":44330,"gender":1},{"content":"ty-","start":44340,"end":44590,"gender":1},{"content":"ty","start":44600,"end":44800,"gender":1}]},{"words":[{"content":"still ","start":44920,"end":45090,"gender":1},{"content":"sip","start":45100,"end":45290,"gender":1},{"content":"pin'' ","start":45300,"end":45570,"gender":1},{"content":"Mai ","start":45580,"end":45940,"gender":1},{"content":"Tais","start":45950,"end":46170,"gender":1}]},{"words":[{"content":"sit","start":46280,"end":46480,"gender":1},{"content":"tin'' ","start":46490,"end":46680,"gender":1},{"content":"court","start":46690,"end":46960,"gender":1},{"content":"side","start":46970,"end":47260,"gender":1}]},{"words":[{"content":"Knicks ","start":47270,"end":47470,"gender":1},{"content":"and ","start":47480,"end":47700,"gender":1},{"content":"Nets","start":47710,"end":47990,"gender":1}]},{"words":[{"content":"give ","start":48000,"end":48180,"gender":1},{"content":"me ","start":48190,"end":48390,"gender":1},{"content":"high ","start":48400,"end":48720,"gender":1},{"content":"five","start":48730,"end":48930,"gender":1}]},{"words":[{"content":"Ni","start":49040,"end":49220,"gender":1},{"content":"gga, ","start":49230,"end":49420,"gender":1},{"content":"I ","start":49430,"end":49620,"gender":1},{"content":"be ","start":49630,"end":49810,"gender":1},{"content":"spiked-","start":49820,"end":50120,"gender":1},{"content":"out","start":50130,"end":50410,"gender":1}]},{"words":[{"content":"I ","start":50420,"end":50600,"gender":1},{"content":"could ","start":50610,"end":50800,"gender":1},{"content":"trip ","start":50810,"end":50990,"gender":1},{"content":"a ","start":51000,"end":51180,"gender":1},{"content":"ref","start":51190,"end":51380,"gender":1},{"content":"er","start":51390,"end":51570,"gender":1},{"content":"ee","start":51580,"end":51820,"gender":1}]},{"words":[{"content":"tell ","start":51830,"end":52090,"gender":1},{"content":"by ","start":52100,"end":52300,"gender":1},{"content":"my ","start":52310,"end":52510,"gender":1},{"content":"at","start":52520,"end":52680,"gender":1},{"content":"ti","start":52690,"end":52890,"gender":1},{"content":"tude","start":52900,"end":53180,"gender":1}]},{"words":[{"content":"that ","start":53190,"end":53370,"gender":1},{"content":"I''m ","start":53380,"end":53580,"gender":1},{"content":"most ","start":53590,"end":53880,"gender":1},{"content":"definitely ","start":53890,"end":54970,"gender":1},{"content":"from","start":54980,"end":55310,"gender":1}]},{"words":[{"content":"I''m ","start":54120,"end":54500,"gender":2},{"content":"in ","start":54510,"end":54950,"gender":2},{"content":"New ","start":54960,"end":55700,"gender":2},{"content":"York","start":55710,"end":57820,"gender":2}]},{"words":[{"content":"con","start":57960,"end":58370,"gender":2},{"content":"crete ","start":58380,"end":58700,"gender":2},{"content":"jun","start":58710,"end":59050,"gender":2},{"content":"gle","start":59060,"end":59330,"gender":2}]},{"words":[{"content":"where ","start":59440,"end":59760,"gender":2},{"content":"dreams ","start":59770,"end":60120,"gender":2},{"content":"are ","start":60130,"end":60500,"gender":2},{"content":"made ","start":60510,"end":61180,"gender":2},{"content":"of","start":61190,"end":61680,"gender":2}]},{"words":[{"content":"there''s ","start":61790,"end":62180,"gender":2},{"content":"not","start":62190,"end":62540,"gender":2},{"content":"hin'' ","start":62550,"end":62890,"gender":2},{"content":"you ","start":62900,"end":63290,"gender":2},{"content":"can''t ","start":63300,"end":63960,"gender":2},{"content":"do","start":63970,"end":64819,"gender":2}]},{"words":[{"content":"now ","start":64930,"end":65290,"gender":2},{"content":"you''re ","start":65300,"end":65690,"gender":2},{"content":"in ","start":65700,"end":66060,"gender":2},{"content":"New ","start":66070,"end":66700,"gender":2},{"content":"York","start":66710,"end":68980,"gender":2}]},{"words":[{"content":"These ","start":69390,"end":69790,"gender":2},{"content":"streets ","start":69800,"end":70140,"gender":2},{"content":"will ","start":70150,"end":70510,"gender":2},{"content":"make","start":70520,"end":70780,"gender":2}]},{"words":[{"content":"you ","start":70890,"end":71220,"gender":2},{"content":"feel ","start":71230,"end":71600,"gender":2},{"content":"brand ","start":71610,"end":72270,"gender":2},{"content":"new","start":72280,"end":72770,"gender":2}]},{"words":[{"content":"big ","start":72900,"end":73290,"gender":2},{"content":"lights ","start":73300,"end":73640,"gender":2},{"content":"will ","start":73650,"end":74000,"gender":2},{"content":"ins","start":74010,"end":74380,"gender":2},{"content":"pire ","start":74390,"end":74990,"gender":2},{"content":"you","start":75000,"end":75530,"gender":2}]},{"words":[{"content":"let''s ","start":75660,"end":76020,"gender":2},{"content":"hear ","start":76030,"end":76390,"gender":2},{"content":"it ","start":76400,"end":76750,"gender":2},{"content":"for ","start":76760,"end":77130,"gender":2},{"content":"New ","start":77140,"end":77780,"gender":2},{"content":"York","start":77790,"end":78340,"gender":2}]},{"words":[{"content":"New ","start":78490,"end":79190,"gender":2},{"content":"York, ","start":79200,"end":79880,"gender":2},{"content":"New ","start":79890,"end":80590,"gender":2},{"content":"York","start":80600,"end":82900,"gender":2}]},{"words":[{"content":"Catch ","start":82320,"end":82500,"gender":1},{"content":"me ","start":82510,"end":82690,"gender":1},{"content":"at ","start":82700,"end":82870,"gender":1},{"content":"the ","start":82880,"end":83070,"gender":1},{"content":"X ","start":83080,"end":83320,"gender":1},{"content":"with ","start":83330,"end":83500,"gender":1},{"content":"O.G","start":83510,"end":83690,"gender":1},{"content":".","start":83700,"end":83940,"gender":1}]},{"words":[{"content":"at ","start":83950,"end":84130,"gender":1},{"content":"a ","start":84140,"end":84320,"gender":1},{"content":"Yan","start":84330,"end":84500,"gender":1},{"content":"kee ","start":84510,"end":84700,"gender":1},{"content":"game","start":84710,"end":85010,"gender":1}]},{"words":[{"content":"shit, ","start":85020,"end":85240,"gender":1},{"content":"I ","start":85250,"end":85430,"gender":1},{"content":"made ","start":85440,"end":85630,"gender":1},{"content":"the ","start":85640,"end":85820,"gender":1},{"content":"Yan","start":85830,"end":85980,"gender":1},{"content":"kee ","start":85990,"end":86160,"gender":1},{"content":"hat","start":86170,"end":86330,"gender":1}]},{"words":[{"content":"more ","start":86340,"end":86520,"gender":1},{"content":"fam","start":86530,"end":86700,"gender":1},{"content":"ous","start":86710,"end":86880,"gender":1}]},{"words":[{"content":"than ","start":86890,"end":87060,"gender":1},{"content":"a ","start":87070,"end":87260,"gender":1},{"content":"Yan","start":87270,"end":87480,"gender":1},{"content":"kee ","start":87490,"end":87670,"gender":1},{"content":"can","start":87680,"end":87840,"gender":1}]},{"words":[{"content":"You ","start":87850,"end":88030,"gender":1},{"content":"should ","start":88040,"end":88260,"gender":1},{"content":"know ","start":88270,"end":88480,"gender":1},{"content":"I ","start":88490,"end":88700,"gender":1},{"content":"bleed ","start":88710,"end":88930,"gender":1},{"content":"blue","start":88940,"end":89140,"gender":1}]},{"words":[{"content":"but ","start":89240,"end":89460,"gender":1},{"content":"I ","start":89470,"end":89660,"gender":1},{"content":"ain''t ","start":89670,"end":89860,"gender":1},{"content":"a ","start":89870,"end":90060,"gender":1},{"content":"crip ","start":90070,"end":90350,"gender":1},{"content":"though","start":90360,"end":90640,"gender":1}]},{"words":[{"content":"but ","start":90650,"end":90850,"gender":1},{"content":"I ","start":90860,"end":91050,"gender":1},{"content":"got ","start":91060,"end":91240,"gender":1},{"content":"a ","start":91250,"end":91430,"gender":1},{"content":"gang ","start":91440,"end":91600,"gender":1},{"content":"of ","start":91610,"end":91780,"gender":1},{"content":"ni","start":91790,"end":91970,"gender":1},{"content":"ggas","start":91980,"end":92140,"gender":1}]},{"words":[{"content":"wal","start":92150,"end":92340,"gender":1},{"content":"kin'' ","start":92350,"end":92530,"gender":1},{"content":"with","start":92540,"end":92750,"gender":1}]},{"words":[{"content":"my ","start":92760,"end":93020,"gender":1},{"content":"clique ","start":93030,"end":93270,"gender":1},{"content":"though","start":93280,"end":93500,"gender":1}]},{"words":[{"content":"Wel","start":93500,"end":93610,"gender":1},{"content":"come ","start":93620,"end":93810,"gender":1},{"content":"to ","start":93820,"end":94000,"gender":1},{"content":"the ","start":94010,"end":94160,"gender":1},{"content":"mel","start":94170,"end":94330,"gender":1},{"content":"tin'' ","start":94340,"end":94510,"gender":1},{"content":"pot","start":94520,"end":94780,"gender":1}]},{"words":[{"content":"cor","start":94790,"end":94940,"gender":1},{"content":"ners ","start":94950,"end":95120,"gender":1},{"content":"where","start":95130,"end":95300,"gender":1}]},{"words":[{"content":"we ","start":95310,"end":95490,"gender":1},{"content":"sel","start":95500,"end":95670,"gender":1},{"content":"lin'' ","start":95680,"end":95870,"gender":1},{"content":"rock","start":95880,"end":96140,"gender":1}]},{"words":[{"content":"Af","start":96150,"end":96320,"gender":1},{"content":"ri","start":96330,"end":96490,"gender":1},{"content":"ka ","start":96500,"end":96670,"gender":1},{"content":"Bam","start":96680,"end":96830,"gender":1},{"content":"baa","start":96840,"end":97010,"gender":1},{"content":"taa ","start":97020,"end":97200,"gender":1},{"content":"shit","start":97210,"end":97420,"gender":1}]},{"words":[{"content":"home ","start":97540,"end":97860,"gender":1},{"content":"of ","start":97870,"end":98070,"gender":1},{"content":"the ","start":98080,"end":98280,"gender":1},{"content":"hip-","start":98290,"end":98600,"gender":1},{"content":"hop","start":98610,"end":98890,"gender":1}]},{"words":[{"content":"Yel","start":98890,"end":99040,"gender":1},{"content":"low ","start":99050,"end":99270,"gender":1},{"content":"cab, ","start":99280,"end":99580,"gender":1},{"content":"gyp","start":99590,"end":99780,"gender":1},{"content":"sy ","start":99790,"end":99970,"gender":1},{"content":"cab","start":99980,"end":100260,"gender":1}]},{"words":[{"content":"dol","start":100270,"end":100440,"gender":1},{"content":"lar ","start":100450,"end":100650,"gender":1},{"content":"cab, ","start":100660,"end":100960,"gender":1},{"content":"hol","start":100970,"end":101150,"gender":1},{"content":"ler ","start":101160,"end":101330,"gender":1},{"content":"back","start":101340,"end":101500,"gender":1}]},{"words":[{"content":"for ","start":101510,"end":101690,"gender":1},{"content":"for","start":101700,"end":101880,"gender":1},{"content":"eig","start":101890,"end":102060,"gender":1},{"content":"ners ","start":102070,"end":102240,"gender":1},{"content":"it ","start":102250,"end":102410,"gender":1},{"content":"ain''t ","start":102420,"end":102580,"gender":1},{"content":"for","start":102590,"end":102760,"gender":1}]},{"words":[{"content":"they ","start":102770,"end":102940,"gender":1},{"content":"act ","start":102950,"end":103120,"gender":1},{"content":"like ","start":103130,"end":103290,"gender":1},{"content":"they","start":103300,"end":103470,"gender":1}]},{"words":[{"content":"for","start":103480,"end":103640,"gender":1},{"content":"got ","start":103650,"end":103820,"gender":1},{"content":"how ","start":103830,"end":104010,"gender":1},{"content":"to ","start":104020,"end":104200,"gender":1},{"content":"act","start":104210,"end":104390,"gender":1}]},{"words":[{"content":"Eight ","start":104400,"end":104710,"gender":1},{"content":"mil","start":104720,"end":104930,"gender":1},{"content":"lion ","start":104940,"end":105150,"gender":1},{"content":"sto","start":105160,"end":105470,"gender":1},{"content":"ries","start":105480,"end":105690,"gender":1}]},{"words":[{"content":"out ","start":105810,"end":106000,"gender":1},{"content":"there ","start":106010,"end":106170,"gender":1},{"content":"in ","start":106180,"end":106380,"gender":1},{"content":"the ","start":106390,"end":106600,"gender":1},{"content":"na","start":106610,"end":106900,"gender":1},{"content":"ked","start":106910,"end":107200,"gender":1}]},{"words":[{"content":"ci","start":107210,"end":107390,"gender":1},{"content":"ty, ","start":107400,"end":107590,"gender":1},{"content":"it''s ","start":107600,"end":107780,"gender":1},{"content":"a ","start":107790,"end":107960,"gender":1},{"content":"pi","start":107970,"end":108140,"gender":1},{"content":"ty","start":108150,"end":108320,"gender":1}]},{"words":[{"content":"half ","start":108330,"end":108510,"gender":1},{"content":"of ","start":108520,"end":108680,"gender":1},{"content":"y''all ","start":108690,"end":108950,"gender":1},{"content":"won''t ","start":108960,"end":109300,"gender":1},{"content":"make ","start":109310,"end":109670,"gender":1},{"content":"it","start":109680,"end":109960,"gender":1}]},{"words":[{"content":"Me, ","start":109960,"end":110080,"gender":1},{"content":"I ","start":110090,"end":110280,"gender":1},{"content":"got ","start":110290,"end":110500,"gender":1},{"content":"a ","start":110510,"end":110680,"gender":1},{"content":"plug","start":110690,"end":110940,"gender":1}]},{"words":[{"content":"spe","start":110950,"end":111170,"gender":1},{"content":"cial ","start":111180,"end":111380,"gender":1},{"content":"ed'', ","start":111390,"end":111560,"gender":1},{"content":"I ","start":111570,"end":111750,"gender":1},{"content":"got ","start":111760,"end":111920,"gender":1},{"content":"it ","start":111930,"end":112120,"gender":1},{"content":"made","start":112130,"end":112340,"gender":1}]},{"words":[{"content":"if ","start":112350,"end":112570,"gender":1},{"content":"Jee","start":112580,"end":112770,"gender":1},{"content":"zy''s ","start":112780,"end":112970,"gender":1},{"content":"pa","start":112980,"end":113150,"gender":1},{"content":"yin'' L","start":113160,"end":113360,"gender":1},{"content":"eb","start":113370,"end":113540,"gender":1},{"content":"ron","start":113550,"end":113770,"gender":1}]},{"words":[{"content":"I''m ","start":113780,"end":113990,"gender":1},{"content":"pa","start":114000,"end":114180,"gender":1},{"content":"yin'' ","start":114190,"end":114380,"gender":1},{"content":"Dw","start":114390,"end":114550,"gender":1},{"content":"ayne ","start":114560,"end":114910,"gender":1},{"content":"Wade","start":114920,"end":115360,"gender":1}]},{"words":[{"content":"Three ","start":115390,"end":115810,"gender":1},{"content":"dice C","start":115820,"end":116210,"gender":1},{"content":"ee-","start":116220,"end":116550,"gender":1},{"content":"lo","start":116560,"end":116790,"gender":1}]},{"words":[{"content":"three ","start":116920,"end":117280,"gender":1},{"content":"card ","start":117290,"end":117640,"gender":1},{"content":"Mon","start":117650,"end":117950,"gender":1},{"content":"ty","start":117960,"end":118280,"gender":1}]},{"words":[{"content":"Lab","start":118290,"end":118460,"gender":1},{"content":"our ","start":118470,"end":118660,"gender":1},{"content":"Day ","start":118670,"end":118860,"gender":1},{"content":"par","start":118870,"end":119050,"gender":1},{"content":"ade","start":119060,"end":119340,"gender":1}]},{"words":[{"content":"rest ","start":119350,"end":119560,"gender":1},{"content":"in ","start":119570,"end":119820,"gender":1},{"content":"peace ","start":119830,"end":120160,"gender":1},{"content":"Bob ","start":120170,"end":120470,"gender":1},{"content":"Mar","start":120480,"end":120790,"gender":1},{"content":"ley","start":120800,"end":121040,"gender":1}]},{"words":[{"content":"Statue ","start":121040,"end":121320,"gender":1},{"content":"of ","start":121330,"end":121610,"gender":1},{"content":"Lib","start":121620,"end":121830,"gender":1},{"content":"er","start":121840,"end":122070,"gender":1},{"content":"ty","start":122080,"end":122350,"gender":1}]},{"words":[{"content":"long ","start":122460,"end":122780,"gender":1},{"content":"live ","start":122790,"end":122980,"gender":1},{"content":"the ","start":122990,"end":123190,"gender":1},{"content":"World ","start":123200,"end":123500,"gender":1},{"content":"Trade","start":123510,"end":123740,"gender":1}]},{"words":[{"content":"long ","start":123870,"end":124110,"gender":1},{"content":"live ","start":124120,"end":124340,"gender":1},{"content":"The ","start":124350,"end":124560,"gender":1},{"content":"King y","start":124570,"end":124900,"gender":1},{"content":"o","start":124910,"end":125110,"gender":1}]},{"words":[{"content":"I''m ","start":125240,"end":125460,"gender":1},{"content":"from ","start":125470,"end":125720,"gender":1},{"content":"the ","start":125730,"end":125940,"gender":1},{"content":"Em","start":125950,"end":126270,"gender":1},{"content":"pire","start":126280,"end":126480,"gender":1}]},{"words":[{"content":"State ","start":126600,"end":126930,"gender":1},{"content":"that''s","start":126940,"end":127380,"gender":1}]},{"words":[{"content":"I''m ","start":126230,"end":126580,"gender":2},{"content":"in ","start":126590,"end":126950,"gender":2},{"content":"New ","start":126960,"end":127670,"gender":2},{"content":"York","start":127680,"end":129810,"gender":2}]},{"words":[{"content":"con","start":129970,"end":130348,"gender":2},{"content":"crete ","start":130360,"end":130720,"gender":2},{"content":"jun","start":130729,"end":131080,"gender":2},{"content":"gle","start":131090,"end":131349,"gender":2}]},{"words":[{"content":"where ","start":131470,"end":131800,"gender":2},{"content":"dreams ","start":131810,"end":132150,"gender":2},{"content":"are ","start":132159,"end":132539,"gender":2},{"content":"made ","start":132550,"end":133180,"gender":2},{"content":"of","start":133189,"end":133710,"gender":2}]},{"words":[{"content":"there''s ","start":133840,"end":134200,"gender":2},{"content":"not","start":134210,"end":134530,"gender":2},{"content":"hin'' ","start":134540,"end":134920,"gender":2},{"content":"you ","start":134930,"end":135310,"gender":2},{"content":"can''t ","start":135320,"end":135950,"gender":2},{"content":"do","start":135960,"end":136810,"gender":2}]},{"words":[{"content":"now ","start":136930,"end":137310,"gender":2},{"content":"you''re ","start":137320,"end":137660,"gender":2},{"content":"in ","start":137670,"end":138080,"gender":2},{"content":"New ","start":138090,"end":138740,"gender":2},{"content":"York","start":138750,"end":140850,"gender":2}]},{"words":[{"content":"These ","start":141390,"end":141790,"gender":2},{"content":"streets ","start":141800,"end":142170,"gender":2},{"content":"will ","start":142180,"end":142530,"gender":2},{"content":"make","start":142540,"end":142770,"gender":2}]},{"words":[{"content":"you ","start":142900,"end":143230,"gender":2},{"content":"feel ","start":143240,"end":143590,"gender":2},{"content":"brand ","start":143600,"end":144250,"gender":2},{"content":"new","start":144260,"end":144760,"gender":2}]},{"words":[{"content":"big ","start":144910,"end":145280,"gender":2},{"content":"lights ","start":145290,"end":145630,"gender":2},{"content":"will ","start":145640,"end":145980,"gender":2},{"content":"ins","start":145990,"end":146360,"gender":2},{"content":"pire ","start":146370,"end":147030,"gender":2},{"content":"you","start":147040,"end":147510,"gender":2}]},{"words":[{"content":"let''s ","start":147660,"end":148050,"gender":2},{"content":"hear ","start":148060,"end":148440,"gender":2},{"content":"it ","start":148450,"end":148790,"gender":2},{"content":"for ","start":148800,"end":149160,"gender":2},{"content":"New ","start":149170,"end":149780,"gender":2},{"content":"York","start":149790,"end":150380,"gender":2}]},{"words":[{"content":"New ","start":150540,"end":151250,"gender":2},{"content":"York, ","start":151260,"end":151920,"gender":2},{"content":"New ","start":151930,"end":152600,"gender":2},{"content":"York","start":152610,"end":154970,"gender":2}]},{"words":[{"content":"Lights ","start":154910,"end":155260,"gender":1},{"content":"is ","start":155270,"end":155610,"gender":1},{"content":"blin","start":155620,"end":156030,"gender":1},{"content":"ding","start":156040,"end":156300,"gender":1}]},{"words":[{"content":"girls ","start":156420,"end":156730,"gender":1},{"content":"need ","start":156740,"end":157100,"gender":1},{"content":"blin","start":157110,"end":157440,"gender":1},{"content":"ders","start":157450,"end":157680,"gender":1}]},{"words":[{"content":"so, ","start":157690,"end":157870,"gender":1},{"content":"they ","start":157880,"end":158050,"gender":1},{"content":"could ","start":158060,"end":158260,"gender":1},{"content":"step","start":158270,"end":158460,"gender":1}]},{"words":[{"content":"out ","start":158470,"end":158670,"gender":1},{"content":"of ","start":158680,"end":158860,"gender":1},{"content":"bounds ","start":158870,"end":159150,"gender":1},{"content":"quick","start":159160,"end":159380,"gender":1}]},{"words":[{"content":"the ","start":159390,"end":159670,"gender":1},{"content":"side","start":159680,"end":159920,"gender":1},{"content":"lines ","start":159930,"end":160290,"gender":1},{"content":"is","start":160300,"end":160630,"gender":1}]},{"words":[{"content":"Lined ","start":160650,"end":160980,"gender":1},{"content":"with ","start":160990,"end":161330,"gender":1},{"content":"cas","start":161340,"end":161530,"gender":1},{"content":"ual","start":161540,"end":161700,"gender":1},{"content":"ties","start":161710,"end":161890,"gender":1}]},{"words":[{"content":"who ","start":161900,"end":162080,"gender":1},{"content":"sip ","start":162090,"end":162270,"gender":1},{"content":"to ","start":162280,"end":162470,"gender":1},{"content":"life ","start":162480,"end":162670,"gender":1},{"content":"cas","start":162680,"end":162900,"gender":1},{"content":"ua","start":162910,"end":163100,"gender":1},{"content":"lly","start":163110,"end":163300,"gender":1}]},{"words":[{"content":"then ","start":163310,"end":163490,"gender":1},{"content":"grad","start":163500,"end":163680,"gender":1},{"content":"ually","start":163690,"end":163880,"gender":1}]},{"words":[{"content":"bec","start":163890,"end":164080,"gender":1},{"content":"ome ","start":164090,"end":164370,"gender":1},{"content":"worse","start":164380,"end":164590,"gender":1}]},{"words":[{"content":"don''t ","start":164700,"end":164960,"gender":1},{"content":"bite ","start":164970,"end":165210,"gender":1},{"content":"the ","start":165220,"end":165440,"gender":1},{"content":"Ap","start":165450,"end":165630,"gender":1},{"content":"ple, ","start":165640,"end":165840,"gender":1},{"content":"Eve","start":165850,"end":166130,"gender":1}]},{"words":[{"content":"Caught ","start":166140,"end":166350,"gender":1},{"content":"up ","start":166360,"end":166560,"gender":1},{"content":"in ","start":166570,"end":166770,"gender":1},{"content":"the ","start":166780,"end":166960,"gender":1},{"content":"in-","start":166970,"end":167250,"gender":1},{"content":"crowd","start":167260,"end":167510,"gender":1}]},{"words":[{"content":"now ","start":167520,"end":167730,"gender":1},{"content":"you''re ","start":167740,"end":167930,"gender":1},{"content":"in ","start":167940,"end":168190,"gender":1},{"content":"style","start":168200,"end":168470,"gender":1}]},{"words":[{"content":"An","start":168590,"end":168790,"gender":1},{"content":"na ","start":168800,"end":168990,"gender":1},{"content":"Win","start":169000,"end":169190,"gender":1},{"content":"tour ","start":169200,"end":169400,"gender":1},{"content":"gets ","start":169410,"end":169620,"gender":1},{"content":"cold","start":169630,"end":169820,"gender":1}]},{"words":[{"content":"in ","start":169830,"end":170070,"gender":1},{"content":"Vogue ","start":170080,"end":170330,"gender":1},{"content":"with ","start":170340,"end":170650,"gender":1},{"content":"your ","start":170660,"end":170900,"gender":1},{"content":"skin ","start":170910,"end":171270,"gender":1},{"content":"out","start":171280,"end":171610,"gender":1}]},{"words":[{"content":"The ","start":171610,"end":171730,"gender":1},{"content":"ci","start":171740,"end":171940,"gender":1},{"content":"ty ","start":171950,"end":172140,"gender":1},{"content":"of ","start":172150,"end":172420,"gender":1},{"content":"sin","start":172430,"end":172650,"gender":1}]},{"words":[{"content":"it''s ","start":172660,"end":172850,"gender":1},{"content":"a ","start":172860,"end":173030,"gender":1},{"content":"pi","start":173040,"end":173200,"gender":1},{"content":"ty ","start":173210,"end":173390,"gender":1},{"content":"on ","start":173400,"end":173590,"gender":1},{"content":"the ","start":173600,"end":173790,"gender":1},{"content":"wind","start":173800,"end":174110,"gender":1}]},{"words":[{"content":"good ","start":174120,"end":174420,"gender":1},{"content":"girls ","start":174430,"end":174740,"gender":1},{"content":"gone ","start":174750,"end":175100,"gender":1},{"content":"bad","start":175110,"end":175320,"gender":1}]},{"words":[{"content":"the ","start":175420,"end":175620,"gender":1},{"content":"ci","start":175630,"end":175820,"gender":1},{"content":"ty''s ","start":175830,"end":176020,"gender":1},{"content":"filled ","start":176030,"end":176220,"gender":1},{"content":"with ","start":176230,"end":176470,"gender":1},{"content":"them","start":176480,"end":176870,"gender":1}]},{"words":[{"content":"Mom","start":177060,"end":177250,"gender":1},{"content":"my ","start":177260,"end":177460,"gender":1},{"content":"took ","start":177470,"end":177670,"gender":1},{"content":"a ","start":177680,"end":177930,"gender":1},{"content":"bus ","start":177940,"end":178200,"gender":1},{"content":"trip","start":178210,"end":178510,"gender":1}]},{"words":[{"content":"now ","start":178520,"end":178720,"gender":1},{"content":"she ","start":178730,"end":178920,"gender":1},{"content":"got ","start":178930,"end":179100,"gender":1},{"content":"her ","start":179110,"end":179310,"gender":1},{"content":"bust ","start":179320,"end":179620,"gender":1},{"content":"out","start":179630,"end":179910,"gender":1}]},{"words":[{"content":"ev","start":179920,"end":180110,"gender":1},{"content":"ery","start":180120,"end":180310,"gender":1},{"content":"bo","start":180320,"end":180500,"gender":1},{"content":"dy ","start":180510,"end":180690,"gender":1},{"content":"ride ","start":180700,"end":180950,"gender":1},{"content":"her","start":180960,"end":181260,"gender":1}]},{"words":[{"content":"just ","start":181270,"end":181610,"gender":1},{"content":"like ","start":181620,"end":181860,"gender":1},{"content":"a ","start":181870,"end":182080,"gender":1},{"content":"bus ","start":182090,"end":182410,"gender":1},{"content":"route","start":182420,"end":182830,"gender":1}]},{"words":[{"content":"Hail ","start":182990,"end":183240,"gender":1},{"content":"Ma","start":183250,"end":183540,"gender":1},{"content":"ry ","start":183550,"end":183720,"gender":1},{"content":"to ","start":183730,"end":183920,"gender":1},{"content":"the ","start":183930,"end":184090,"gender":1},{"content":"ci","start":184100,"end":184280,"gender":1},{"content":"ty","start":184290,"end":184460,"gender":1}]},{"words":[{"content":"you''re ","start":184470,"end":184650,"gender":1},{"content":"a ","start":184660,"end":184860,"gender":1},{"content":"vir","start":184870,"end":185130,"gender":1},{"content":"gin","start":185140,"end":185360,"gender":1}]},{"words":[{"content":"and ","start":185370,"end":185530,"gender":1},{"content":"Je","start":185540,"end":185710,"gender":1},{"content":"sus ","start":185720,"end":185890,"gender":1},{"content":"can''t ","start":185900,"end":186190,"gender":1},{"content":"save ","start":186200,"end":186370,"gender":1},{"content":"you","start":186380,"end":186550,"gender":1}]},{"words":[{"content":"life ","start":186560,"end":186870,"gender":1},{"content":"starts","start":186880,"end":187160,"gender":1}]},{"words":[{"content":"when ","start":187170,"end":187350,"gender":1},{"content":"the ","start":187360,"end":187590,"gender":1},{"content":"church ","start":187600,"end":187900,"gender":1},{"content":"end","start":187910,"end":188260,"gender":1}]},{"words":[{"content":"Came ","start":188270,"end":188580,"gender":1},{"content":"here ","start":188590,"end":188780,"gender":1},{"content":"for ","start":188790,"end":188980,"gender":1},{"content":"school","start":188990,"end":189280,"gender":1}]},{"words":[{"content":"gra","start":189290,"end":189470,"gender":1},{"content":"du","start":189480,"end":189640,"gender":1},{"content":"at","start":189650,"end":189820,"gender":1},{"content":"ed ","start":189830,"end":190000,"gender":1},{"content":"to ","start":190010,"end":190180,"gender":1},{"content":"the ","start":190190,"end":190370,"gender":1},{"content":"high ","start":190380,"end":190650,"gender":1},{"content":"life","start":190660,"end":190860,"gender":1}]},{"words":[{"content":"ball ","start":190980,"end":191290,"gender":1},{"content":"pla","start":191300,"end":191480,"gender":1},{"content":"yers, ","start":191490,"end":191740,"gender":1},{"content":"rap ","start":191750,"end":192060,"gender":1},{"content":"stars","start":192070,"end":192310,"gender":1}]},{"words":[{"content":"ad","start":192320,"end":192470,"gender":1},{"content":"dic","start":192480,"end":192660,"gender":1},{"content":"ted ","start":192670,"end":192850,"gender":1},{"content":"to ","start":192860,"end":193020,"gender":1},{"content":"the ","start":193030,"end":193220,"gender":1},{"content":"lime","start":193230,"end":193500,"gender":1},{"content":"light","start":193510,"end":193730,"gender":1}]},{"words":[{"content":"M.D","start":193830,"end":194040,"gender":1},{"content":".M","start":194050,"end":194250,"gender":1},{"content":".A","start":194260,"end":194500,"gender":1},{"content":". ","start":194510,"end":194720,"gender":1},{"content":"got ","start":194730,"end":194950,"gender":1},{"content":"you ","start":194960,"end":195150,"gender":1},{"content":"fee","start":195160,"end":195350,"gender":1},{"content":"lin''","start":195360,"end":195520,"gender":1}]},{"words":[{"content":"like ","start":195530,"end":195720,"gender":1},{"content":"a ","start":195730,"end":195920,"gender":1},{"content":"cham","start":195930,"end":196150,"gender":1},{"content":"pion","start":196160,"end":196360,"gender":1}]},{"words":[{"content":"this ","start":196370,"end":196550,"gender":1},{"content":"ci","start":196560,"end":196750,"gender":1},{"content":"ty ","start":196760,"end":196950,"gender":1},{"content":"nev","start":196960,"end":197130,"gender":1},{"content":"er ","start":197140,"end":197320,"gender":1},{"content":"sleeps","start":197330,"end":197570,"gender":1}]},{"words":[{"content":"bet","start":197580,"end":197760,"gender":1},{"content":"ter ","start":197770,"end":197960,"gender":1},{"content":"slip ","start":197970,"end":198260,"gender":1},{"content":"you ","start":198270,"end":198430,"gender":1},{"content":"an ","start":198440,"end":198620,"gender":1},{"content":"Am","start":198630,"end":198800,"gender":1},{"content":"bi","start":198810,"end":199100,"gender":1},{"content":"en","start":199110,"end":199350,"gender":1}]},{"words":[{"content":"I''m ","start":198300,"end":198680,"gender":2},{"content":"in ","start":198690,"end":199060,"gender":2},{"content":"New ","start":199070,"end":199680,"gender":2},{"content":"York","start":199690,"end":201900,"gender":2}]},{"words":[{"content":"con","start":201980,"end":202380,"gender":2},{"content":"crete ","start":202390,"end":202790,"gender":2},{"content":"jun","start":202800,"end":203130,"gender":2},{"content":"gle","start":203140,"end":203390,"gender":2}]},{"words":[{"content":"where ","start":203500,"end":203810,"gender":2},{"content":"dreams ","start":203820,"end":204160,"gender":2},{"content":"are ","start":204170,"end":204550,"gender":2},{"content":"made ","start":204560,"end":205180,"gender":2},{"content":"of","start":205190,"end":205670,"gender":2}]},{"words":[{"content":"there''s ","start":205810,"end":206200,"gender":2},{"content":"not","start":206210,"end":206550,"gender":2},{"content":"hin'' ","start":206560,"end":206920,"gender":2},{"content":"you ","start":206930,"end":207300,"gender":2},{"content":"can''t ","start":207310,"end":207960,"gender":2},{"content":"do","start":207970,"end":208780,"gender":2}]},{"words":[{"content":"now ","start":208910,"end":209320,"gender":2},{"content":"you''re ","start":209330,"end":209690,"gender":2},{"content":"in ","start":209700,"end":210060,"gender":2},{"content":"New ","start":210070,"end":210710,"gender":2},{"content":"York","start":210720,"end":212990,"gender":2}]},{"words":[{"content":"These ","start":213380,"end":213810,"gender":2},{"content":"streets ","start":213820,"end":214170,"gender":2},{"content":"will ","start":214180,"end":214540,"gender":2},{"content":"make","start":214550,"end":214800,"gender":2}]},{"words":[{"content":"you ","start":214910,"end":215250,"gender":2},{"content":"feel ","start":215260,"end":215630,"gender":2},{"content":"brand ","start":215640,"end":216270,"gender":2},{"content":"new","start":216280,"end":216790,"gender":2}]},{"words":[{"content":"big ","start":216910,"end":217300,"gender":2},{"content":"lights ","start":217310,"end":217650,"gender":2},{"content":"will ","start":217660,"end":218030,"gender":2},{"content":"ins","start":218040,"end":218430,"gender":2},{"content":"pire ","start":218440,"end":219040,"gender":2},{"content":"you","start":219050,"end":219620,"gender":2}]},{"words":[{"content":"let''s ","start":219730,"end":220110,"gender":2},{"content":"hear ","start":220120,"end":220480,"gender":2},{"content":"it ","start":220490,"end":220810,"gender":2},{"content":"for ","start":220820,"end":221150,"gender":2},{"content":"New ","start":221160,"end":221820,"gender":2},{"content":"York","start":221830,"end":222380,"gender":2}]},{"words":[{"content":"New ","start":222530,"end":223230,"gender":2},{"content":"York, ","start":223240,"end":223910,"gender":2},{"content":"New ","start":223920,"end":224600,"gender":2},{"content":"York","start":224610,"end":227080,"gender":2}]},{"words":[{"content":"One ","start":227240,"end":227630,"gender":2},{"content":"hand ","start":227640,"end":227980,"gender":2},{"content":"in ","start":227990,"end":228230,"gender":2},{"content":"the ","start":228240,"end":228420,"gender":2},{"content":"air","start":228430,"end":228710,"gender":2}]},{"words":[{"content":"for ","start":228720,"end":228900,"gender":2},{"content":"the ","start":228910,"end":229100,"gender":2},{"content":"big ","start":229110,"end":229420,"gender":2},{"content":"ci","start":229430,"end":229610,"gender":2},{"content":"ty","start":229620,"end":229940,"gender":2}]},{"words":[{"content":"street ","start":230060,"end":230420,"gender":2},{"content":"lights, ","start":230430,"end":230770,"gender":2},{"content":"big ","start":230780,"end":231130,"gender":2},{"content":"dreams","start":231140,"end":231370,"gender":2}]},{"words":[{"content":"all ","start":231490,"end":231800,"gender":2},{"content":"loo","start":231810,"end":232010,"gender":2},{"content":"kin'' ","start":232020,"end":232200,"gender":2},{"content":"pre","start":232210,"end":232380,"gender":2},{"content":"tty","start":232390,"end":232780,"gender":2}]},{"words":[{"content":"No ","start":232810,"end":233190,"gender":2},{"content":"place ","start":233200,"end":233540,"gender":2},{"content":"in ","start":233550,"end":233740,"gender":2},{"content":"the ","start":233750,"end":233940,"gender":2},{"content":"world","start":233950,"end":234150,"gender":2}]},{"words":[{"content":"that ","start":234260,"end":234440,"gender":2},{"content":"could ","start":234450,"end":234660,"gender":2},{"content":"com","start":234670,"end":235020,"gender":2},{"content":"pare","start":235030,"end":235380,"gender":2}]},{"words":[{"content":"put ","start":235520,"end":235750,"gender":2},{"content":"your ","start":235760,"end":235920,"gender":2},{"content":"ligh","start":235930,"end":236130,"gender":2},{"content":"ters ","start":236140,"end":236310,"gender":2},{"content":"in ","start":236320,"end":236510,"gender":2},{"content":"the ","start":236520,"end":236700,"gender":2},{"content":"air","start":236710,"end":237020,"gender":2}]},{"words":[{"content":"ev","start":237030,"end":237200,"gender":2},{"content":"ery","start":237210,"end":237420,"gender":2},{"content":"body ","start":237430,"end":237720,"gender":2},{"content":"say ","start":237730,"end":238150,"gender":2},{"content":"Yeah, ","start":238160,"end":239130,"gender":2},{"content":"Yeah","start":239140,"end":240190,"gender":2}]},{"words":[{"content":"Yeah, ","start":240830,"end":241900,"gender":2},{"content":"Yeah","start":241910,"end":242560,"gender":2}]},{"words":[{"content":"I''m ","start":242580,"end":242950,"gender":2},{"content":"in ","start":242960,"end":243350,"gender":2},{"content":"New ","start":243360,"end":243980,"gender":2},{"content":"York","start":243990,"end":246160,"gender":2}]},{"words":[{"content":"con","start":246310,"end":246710,"gender":2},{"content":"crete ","start":246720,"end":247090,"gender":2},{"content":"jun","start":247100,"end":247430,"gender":2},{"content":"gle","start":247440,"end":247690,"gender":2}]},{"words":[{"content":"where ","start":247810,"end":248130,"gender":2},{"content":"dreams ","start":248140,"end":248490,"gender":2},{"content":"are ","start":248500,"end":248890,"gender":2},{"content":"made ","start":248900,"end":249510,"gender":2},{"content":"of","start":249520,"end":250000,"gender":2}]},{"words":[{"content":"there''s ","start":250120,"end":250520,"gender":2},{"content":"not","start":250530,"end":250900,"gender":2},{"content":"hin'' ","start":250910,"end":251240,"gender":2},{"content":"you ","start":251250,"end":251630,"gender":2},{"content":"can''t ","start":251640,"end":252280,"gender":2},{"content":"do","start":252290,"end":253150,"gender":2}]},{"words":[{"content":"now ","start":253280,"end":253650,"gender":2},{"content":"you''re ","start":253660,"end":254010,"gender":2},{"content":"in ","start":254020,"end":254400,"gender":2},{"content":"New ","start":254410,"end":255040,"gender":2},{"content":"York","start":255050,"end":257190,"gender":2}]},{"words":[{"content":"These ","start":257728,"end":258140,"gender":2},{"content":"streets ","start":258149,"end":258500,"gender":2},{"content":"will ","start":258510,"end":258880,"gender":2},{"content":"make","start":258890,"end":259130,"gender":2}]},{"words":[{"content":"you ","start":259238,"end":259570,"gender":2},{"content":"feel ","start":259579,"end":259940,"gender":2},{"content":"brand ","start":259950,"end":260579,"gender":2},{"content":"new","start":260589,"end":261100,"gender":2}]},{"words":[{"content":"big ","start":261238,"end":261620,"gender":2},{"content":"lights ","start":261630,"end":261959,"gender":2},{"content":"will ","start":261970,"end":262330,"gender":2},{"content":"ins","start":262340,"end":262750,"gender":2},{"content":"pire ","start":262760,"end":263359,"gender":2},{"content":"you","start":263370,"end":263830,"gender":2}]},{"words":[{"content":"let''s ","start":263950,"end":264380,"gender":2},{"content":"hear ","start":264390,"end":264760,"gender":2},{"content":"it ","start":264770,"end":265100,"gender":2},{"content":"for ","start":265109,"end":265500,"gender":2},{"content":"New ","start":265510,"end":266130,"gender":2},{"content":"York","start":266140,"end":266710,"gender":2}]},{"words":[{"content":"New ","start":266830,"end":267510,"gender":2},{"content":"York, ","start":267520,"end":268239,"gender":2},{"content":"New ","start":268250,"end":268910,"gender":2},{"content":"York\\u2026","start":268920,"end":271340,"gender":2}]}]}');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(32) NOT NULL,
  `password` varchar(80) NOT NULL,
  `regtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `information` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `regtime`, `information`) VALUES
(1, 'ndtrung', '$2a$08$/UCVozZnND0/M3IoCFX7relBRMms802d5peeL4vO3JWGM8G6/Q8jW', '2013-12-12 16:51:05', NULL),
(3, 'mimi', '$2a$08$0fKdnjE5N6Na1DCiYVTUpOeO8NSpItEGIzwTKB.EqOQqb5Z/GaVke', '2013-12-13 17:06:54', NULL),
(7, 'lala', '$2a$08$FFFkpahqqQbAJtJr7FqQNeWEqExPrZYHouc6DcxkO6391kmN/btVC', '2013-12-13 17:41:42', NULL),
(8, 'phuockk', '$2a$08$poou7CvIMrZil0DD8wpA7.0IVE6VzhHEe8LcfDSC6a1DvbZh2FfJi', '2013-12-13 18:20:46', NULL),
(10, 'phuoc', '$2a$08$YQ7FFGQxU4V3igL7yRGrmOui5m0FseBuMa.v9iIYJ0in3Zi/TDpVu', '2013-12-13 18:22:23', NULL),
(12, 'ndtrung2', '$2a$08$G7egG0.7ch0GTWaD92ax1eNdJP7/YJyLCbYBgFqJO0xU3AGSO.rge', '2013-12-24 03:45:11', NULL),
(14, 'ndtrung4', '$2a$08$6WQxWYzJ5qT1cm6JjwGpJuyzCwMY8DywuXOuoaG0dfWqLb7GvJ8yq', '2013-12-24 16:32:51', NULL),
(15, 'fbndtrung', '$2a$08$DNmXkH4w1w4RCe905D9mluud3GJPm3MoSfWs5RizpaySX/O8khULW', '2014-02-02 20:51:36', NULL),
(16, 'fbndtrung3', '$2a$08$U5yxalQcynKGseSJDdtMf.G2a.d1Ye.H/bD/WIbXBX8tAzW9RJFMq', '2014-02-02 22:43:34', NULL),
(17, 'ndtrung1yahoocom', '$2a$08$fKSHN78RGkqOJHogxUsnbeWbj/kFzxKUmzIMwGYmPxsTAtCeOfvXW', '2014-02-02 23:28:09', NULL),
(18, 'ndtrung1@yahoocom', '$2a$08$4CanyYcOZTv5bMRfAtHF8OH4eWac7tuJA/0tnN5vu/OkvNTWABZc2', '2014-02-02 23:29:25', NULL),
(21, 'ndtrung1@yahoo.com2', '$2a$08$roC2aCQ1NlMzCw5aLCjkLudwqVaX9swfVyHwMzbhJS8u52GonOw.q', '2014-02-02 23:29:39', NULL),
(22, 'ndtrung1@yahoo.com3', '$2a$08$bb86dCyg/IfyU4ShTnEFLuGrZgV4GKoe3ib0Y6j6QB/9oCITSXMbq', '2014-02-02 23:30:17', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
