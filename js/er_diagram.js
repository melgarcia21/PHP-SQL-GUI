

jsPlumb.ready(function () {
    // Suppliers to Ingredients
    jsPlumb.connect({
        source: "suppliers",
        target: "ingredients",
        anchors: ["Right", "Left"],
        endpoint: "Rectangle"
    });

    // Ingredients to Items
    jsPlumb.connect({
        source: "ingredients",
        target: "items",
        anchors: ["Right", "Left"],
        endpoint: "Rectangle"
    });

    // Items to Meals
    jsPlumb.connect({
        source: "items",
        target: "meals",
        anchors: ["Right", "Left"],
        endpoint: "Rectangle"
    });

    // Meals to Menuitems
    jsPlumb.connect({
        source: "meals",
        target: "menuitems",
        anchors: ["Right", "Left"],
        endpoint: "Rectangle"
    });

    // Items to MadeWith (many-to-many relationship)
    jsPlumb.connect({
        source: "items",
        target: "madewith",
        anchors: ["Right", "Left"],
        endpoint: "Rectangle"
    });

    // MadeWith to Ingredients
    jsPlumb.connect({
        source: "madewith",
        target: "ingredients",
        anchors: ["Right", "Left"],
        endpoint: "Rectangle"
    });

    // PartOf to Meals
    jsPlumb.connect({
        source: "partof",
        target: "meals",
        anchors: ["Right", "Left"],
        endpoint: "Rectangle"
    });

    // PartOf to Items
    jsPlumb.connect({
        source: "partof",
        target: "items",
        anchors: ["Right", "Left"],
        endpoint: "Rectangle"
    });

    // Enable dragging for better interaction
    jsPlumb.draggable("suppliers");
    jsPlumb.draggable("ingredients");
    jsPlumb.draggable("items");
    jsPlumb.draggable("meals");
    jsPlumb.draggable("menuitems");
    jsPlumb.draggable("madewith");
    jsPlumb.draggable("partof");
});
