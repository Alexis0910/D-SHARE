var authKey = "l7xx46c00b11477744339549d3160f8ae14a";


// const routeList = [
//     {
//         start:"pajuStation",
//         destination:"dongmaLand",
//         dropby: "pajuSamokLi";
//     },
//     {
//         start:"jungangStation",
//         destination:"shiplipoBeach",
//         dropby: "sihwa";
//     },
//     {
//         start:"cueverland",
//         destination:"masungIC",
//         dropby: "hoamArtmuseum";
//     },
//     {
//         start:"gokban",
//         destination:"pajuStation",
//         dropby: "pajuSamokLi";
//     },
//     {
//         start:"mangpo",
//         destination:"gyanggyoLake",
//         dropby: "dongsuwonIC";
//     },
//     {
//         start:"pochunIC",
//         destination:"pochunSuwonMt",
//         dropby: "";
//     },
//     {
//         start:"gs25Houngchun",
//         destination:"gangwonChunChun",
//         dropby: "neuratjaeTunnel";
//     },

// ];
//     //루트 업데이트
//     function updateRoute(){
//         const output = [];

//         route.forEach((el, i)=>{
//             output.push(`
            
//             `)
//         });
//         route.innerHTML = output.join(' ');
//     }
//     updateRoute();


var route1 = ["pajuStation", "dongmaLand", "pajuSamokLi"];
var route2 = ["mangpo", "gyanggyoLake", "dongsuwonIC" ];
var route3 = ["jungangStation", "shiplipoBeach", "sihwa"];
var route4 = ["cueverland", "masungIC", "hoamArtmuseum"];
var route5 = ["gokban", "pajuStation", "pajuSamokLi"];
var route6 = ["pochunIC", "pochunSuwonMt"];
var route7 = ["gs25Houngchun", "gangwonChunChun", "neuratjaeTunnel"];

var timeOffset = 1; // 특정 시간 후의 경로 탐색 (1시간 후)

var places = {
    jungangStation: {
        name: "중앙역",
        locX: 126.838384,
        locY: 37.316532
    },
    sihwa: {
        name: "시화나래휴게소",
        locX: 126.608026,
        locY: 37.312575
    },
    shiplipoBeach: {
        name: "십리포 해변",
        locX: 126.483467,
        locY: 37.280868
    },
    pajuStation: {
        name: "파주역 경의중앙선",
        locX: 126.793159,
        locY: 37.814875
    },
    gokban: {
        name: "명인만두",
        locX: 126.753481,
        locY: 37.239072
    },
    pajuSamokLi: {
        name: "경기도 파주시 문산읍 사목리 207-2",
        locX: 126.766319,
        locY: 37.867962
    },
    dongmaLand: {
        name: "동마기업 평화랜드",
        locX: 126.747949,
        locY: 37.893748
    },
    mangpo: {
        name: "망포역",
        locX: 127.056255,
        locY: 37.245908
    },
    dongsuwonIC: {
        name: "동수원IC",
        locX: 127.049671,
        locY: 37.300151
    },
    gyanggyoLake: {
        name: "광교호수공원",
        locX: 127.066419,
        locY: 37.277052
    },
    cueverland: {
        name: "CU용인에버랜드점",
        locX: 127.21816,
        locY: 37.287301
    },
    hoamArtmuseum: {
        name: "호암미술관",
        locX: 127.191332,
        locY: 37.293642
    },
    masungIC: {
        name: "마성IC",
        locX: 127.176704,
        locY: 37.283504
    },
    pochunIC: {
        name: "포천ic",
        locX: 127.219619,
        locY: 337.880869
    },
    pochunSuwonMt: {
        name: "포천 수원산전망대",
        locX: 127.274379,
        locY: 37.850431
    },
    gs25Houngchun: {
        name: "gs25 홍천신내점",
        locX: 127.947623,
        locY: 37.747621
    },
    neuratjaeTunnel: {
        name: "느랏재터널",
        locX: 127.819846,
        locY: 37.889882
    },
    gangwonChunChun: {
        name: "강원 춘천시 신북읍 유포리",
        locX: 127.790493,
        locY: 37.989533
    },
    gs25Houngchun: {
        name: "gs25 홍천신내점",
        locX: 127.947623,
        locY: 37.747621
    },
};