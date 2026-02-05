import { describe, it, expect } from "vitest";
import { mount } from "@vue/test-utils";
import CoordinateForm from "../src/components/CoordinateForm.vue";

describe("CoordinateForm", () => {
  it("disables submit button when inputs are empty", () => {
    const wrapper = mount(CoordinateForm);

    const button = wrapper.get("button");
    expect(button.attributes("disabled")).toBeDefined();
  });

  it("enables submit button when all coordinates are provided", async () => {
    const wrapper = mount(CoordinateForm);

    const inputs = wrapper.findAll("input");
    expect(inputs.length).toBe(4);

    await inputs[0].setValue(52);
    await inputs[1].setValue(21);
    await inputs[2].setValue(50);
    await inputs[3].setValue(19);

    const button = wrapper.get("button");
    expect(button.attributes("disabled")).toBeUndefined();
  });
});
